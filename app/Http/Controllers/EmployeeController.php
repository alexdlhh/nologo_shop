<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\EmployeeRepository;
use App\Http\Repository\PagesRepository;

class EmployeeController extends Controller
{
    /**
     * @param int $page
     * @param string $search
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employees(int $page=1, string $search='')
    {
        $employeeRepository = new EmployeeRepository();
        $employees = $employeeRepository->getAll($page, $search);
        $total = $employeeRepository->getTotal($search);
        $pages = ceil($total/10);

        return view('admin.employee.list', ['admin'=>['title'=>'Empleados','employees'=>$employees, 'search'=>$search, 'page'=>$page, 'total_pages'=>$total, 'pages'=>$pages,'section' => 'rfeg','subsection' => 'employees']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateEmployee()
    {
        return view('admin.employee.create', ['admin'=>['title'=>'Crear Empleado','section' => 'rfeg','subsection' => 'saveemployees']]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function EditEmployee(int $id)
    {
        $employeeRepository = new EmployeeRepository();
        $employee = $employeeRepository->getOne(['id'=>$id]);
        return view('admin.employee.edit', ['admin'=>['title'=>'Empleado','employee'=>$employee,'section' => 'rfeg','subsection' => 'saveemployees']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(Request $request){
        $employeeRepository = new EmployeeRepository();
        $featuredImage = '';
        if(!empty($request->file('featuredImage'))){
            $image = $request->file('featuredImage');
            //prepare image name with title without special characters and spaces
            $image_name = str_replace(' ', '', $request->input('name'));
            $image_name = preg_replace('/[^A-Za-z0-9\-]/', '', $image_name);        
            $featuredImage = time().$image_name.'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/employee/');
            $image->move($destinationPath, $featuredImage);
            //change $request feature_image content to current location of image
            $featuredImage = '/images/employee/'.$featuredImage;
            $request->input('featuredImage', $featuredImage);
        }else{
            if(!empty($request->input('old_image'))){
                $featuredImage = $request->input('old_image');
            }
        }
        if($request->input('id') != 0){
            $id = $employeeRepository->update($request,$featuredImage);
        } else {
            $id = $employeeRepository->create($request,$featuredImage);
        }
        return $id;
    }

    /**
     * @param int $id
     * @return int $id
     */
    public function delete(int $id){
        $employeeRepository = new EmployeeRepository();
        return $employeeRepository->delete($id);
    }
}