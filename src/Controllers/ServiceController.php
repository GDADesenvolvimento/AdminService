<?php

namespace GdaDesenv\AdminService\Controllers;

use App\Http\Controllers\Controller;
use GdaDesenv\AdminService\Entities\Service;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('AdminService::service.services',[
            'services' => $services
        ]);
    }

    public function form()
    {
        return view('AdminService::service.form');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'icone' => 'required',
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('service.form')->withErrors($validator)->withInput();
        }

        $service = new Service();
        $service->icone = $request->input('icone');
        $service->nome = $request->input('nome');
        $service->descricao = $request->input('descricao');
        $service->save();

        $services = Service::all();
        return redirect()->route('services',['services' => $services])->with('success', 'Serviço salvo com sucesso!');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('AdminService::service.edit',[
            'service' => $service
        ]);
    }

    public function update(Request $request)
    {
        $service = Service::find($request->input('id'));

        $validator = Validator::make($request->all(), [
            'icone' => 'required',
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('service.edit',['id' => $request->input('id')])->withErrors($validator)->withInput();
        }

        $service->icone = $request->input('icone');
        $service->nome = $request->input('nome');
        $service->descricao = $request->input('descricao');
        $service->save();

        $services = Service::all();
        return redirect()->route('services',['services' => $services])->with('success', 'Serviço atualizado com sucesso!');
    }

    public function delete($id)
    {
        Service::destroy($id);

        $services = Service::all();
        return redirect()->route('services',['services' => $services])->with('success', 'Serviço removido com sucesso!');
    }
}
