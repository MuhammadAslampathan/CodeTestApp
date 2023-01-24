<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Customers\Customer;

class ConnectorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessToken = "C66EF7B239D24632943D115EDE9CB810-EA00F8FD8294692C940F6B5A8F9453D";
        $clientToken = "E0D439EE522F44368DC78E1BFB03710C-D24FB11DBE31D4621C4817E028D9E1D";
        $client      = "Sample Client 1.0.0";

        $response = Http::post('https://api.mews-demo.com/api/connector/v1/customers/getAll', [
            "ClientToken" => $clientToken,
            "AccessToken" => $accessToken,
            "Client"      => $client,
            "Emails"=>
            [
                "john@doe.com"
            ],
            "Limitation"=>
            [
                "Cursor"  => "e7f26210-10e7-462e-9da8-ae8300be8ab7",
                "Count"   => 500
            ]
         ]);

        $jsonData = $response->json();

        foreach ($jsonData['Customers'] as  $data) {
            if($data['Id']){
            $customers = new Customer();
            $customers->CustomerId = $data['Id'];
            $customers->Number = $data['Number'];
            $customers->Title = $data['Title'];
            $customers->Sex = $data['Sex'];
            $customers->Gender = $data['Gender'];
            $customers->FirstName = $data['FirstName'];
            $customers->LastName = $data['LastName'];
            $customers->SecondLastName = $data['SecondLastName'];
            $customers->NationalityCode = $data['NationalityCode'];
            $customers->LanguageCode = $data['LanguageCode'];
            $customers->BirthDate = $data['BirthDate'];
            $customers->BirthPlace = $data['BirthPlace'];
            $customers->CitizenNumber = $data['CitizenNumber'];
            $customers->MotherName = $data['MotherName'];
            $customers->FatherName = $data['FatherName'];
            $customers->Occupation = $data['Occupation'];
            $customers->Email = $data['Email'];
            $customers->Phone = $data['Phone'];
            $customers->Passport = implode(',',$data['Passport']);
            $customers->TaxIdentificationNumber = $data['TaxIdentificationNumber'];
            $customers->AccountingCode = $data['AccountingCode'];
            $customers->LoyaltyCode = $data['LoyaltyCode'];
            $customers->BillingCode = $data['BillingCode'];
            $customers->Notes = $data['Notes'];
            $customers->CarRegistrationNumber = $data['CarRegistrationNumber'];
            $customers->ItalianDestinationCode = $data['ItalianDestinationCode'];
            $customers->ItalianFiscalCode = $data['ItalianFiscalCode'];
            $customers->CompanyId = $data['CompanyId'];
            $customers->MergeTargetId = $data['MergeTargetId'];
            $customers->ActivityState = $data['ActivityState'];
            
            $customers->save();
            }
        }
        dd($jsonData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
