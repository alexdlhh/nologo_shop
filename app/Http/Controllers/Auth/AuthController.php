<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Http\Repository\RSRepository;
use App\Http\Repository\PagesRepository;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index(){
        $pageRepository = new PagesRepository();
        $RSRepository = new RSRepository();
        $headers = $pageRepository->getAll('section','=','1');
        $rs = $RSRepository->getAll();
        $front = [
            'headers' => $headers,
            'section' => 'Login',
            'rs' => $rs
        ];
        return view('auth.login')->with('front',$front);

    }  

      

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function registration(){
        $pageRepository = new PagesRepository();
        $headers = $pageRepository->getAll('section','=','1');
        return view('auth.registration')->with('headers',$headers);

    }

      

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {            
            return redirect()->intended('dashboard');
        }

        return redirect("login")->withSuccess('Oppes! Parece que tu contraseña o usuario son incorrectos');

    }

      

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postRegistration(Request $request){  

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard");

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postAdminRegistration(Request $request){  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return $check;
    }

    

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function dashboard(){
        $pageRepository = new PagesRepository();
        $headers = $pageRepository->getAll('section','=','1');
        $admin = ['title' => 'Dashboard','section'=>'','subsection'=>''];
        if(Auth::check()){
            return Auth::user()->role==1 ?  view('admin/admin')->with('admin',$admin) :  view('dashboard')->with('headers',$headers);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function create(array $data){

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => !empty($data['role']) ? $data['role'] : 2,
      ]);

    }

    

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function logout() {

        Session::flush();
        Auth::logout();

        return Redirect('login');

    }

    /**
     * List all users
     * @return view
     */
    public function users(){
        $pageRepository = new PagesRepository($role=0,$search='');
        $headers = $pageRepository->getAll('section','=','1');
        $filters = ['role'=>$role,'search'=>$search];
        $users = User::all();
        return view('admin/users/list')->with('users',$users)->with('admin',['title' => 'Users', 'users' => $users,'section'=>'','subsection'=>'']);
    }

    /**
     * Create new user
     * @return view
     */
    public function createUser(){
        $pageRepository = new PagesRepository($role=0,$search='');
        $headers = $pageRepository->getAll('section','=','1');
        return view('admin/users/create')->with('admin',['title' => 'Create User', 'users' => [],'section'=>'','subsection'=>'']);
    }

    /**
     * Edit user
     * @return view
     */
    public function editUser($id){
        $pageRepository = new PagesRepository($role=0,$search='');
        $headers = $pageRepository->getAll('section','=','1');
        $user = User::find($id);
        return view('admin/users/edit')->with('admin',['title' => 'Edit User', 'users' => $user, 'section'=>'','subsection'=>'']);
    }

    /**
     * Update user
     * @param  Request $request
     * @return int status
     */
    public function updateUser(Request $request){
        //actualizar usuario
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        !empty($request->password)?$user->password = Hash::make($request->password):'';
        $user->role = $request->role;
        $user->save();
        return 1;
    }

    /**
     * Delete user
     * @param  int $id
     * @return int status
     */
    public function deleteUser(int $id){
        //eliminar usuario
        $user = User::find($id);
        $user->delete();
        return 1;
    }

    
}
