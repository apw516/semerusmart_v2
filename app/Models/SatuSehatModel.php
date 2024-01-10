<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class SatuSehatModel extends Model
{
    public $authurl = 'https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1';
    public $baseurl = 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1/';
    public static function accesstoken()
    {
        $client = new Client();
        $client_id =  'cVT5QJgMHFhLhbTBlPiPNg0QdAlTuBK51qWaNb76gYBpH1tQ';
        $secret_client = '9g2GPDVFN9sZvnb2IPaIuqHsqsI13mVjQIkj08szA2xiqALDuerE2OvcviKsbF7F';
        $url = "https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1/accesstoken?grant_type=client_credentials";
        $data = [
            'client_id' => $client_id,
            'client_secret' => $secret_client,
        ];
        // try{
        $response = $client->request('POST', $url, [
            'form_params' => $data,
            'allow_redirects' => true,
            'timeout' => 20
        ]);
        $response = json_decode($response->getBody());
        $response = array(
            'Authorization' => "Bearer " . $response->access_token,
        );
        return $response;
        // }catch(ClientException){
        //     return 'RTO';
        // }
    }
    public function Organization_create()
    {
        $data2 = '{
            "resourceType": "Organization",
            "active": true,
            "identifier": [
                {
                    "use": "official",
                    "system": "http://sys-ids.kemkes.go.id/organization/1000079374",
                    "value": "semerusmart_3"
                }
            ],
            "type": [
                {
                    "coding": [
                        {
                            "system": "http://terminology.hl7.org/CodeSystem/organization-type",
                            "code": "dept",
                            "display": "Hospital Department"
                        }
                    ]
                }
            ],
            "name": "semerusmart_3",
            "telecom": [
                {
                    "system": "phone",
                    "value": "+6221-783042654",
                    "use": "work"
                },
                {
                    "system": "email",
                    "value": "rs-satusehat@gmail.com",
                    "use": "work"
                },
                {
                    "system": "url",
                    "value": "www.rs-satusehat@gmail.com",
                    "use": "work"
                }
            ],
            "address": [
                {
                    "use": "work",
                    "type": "both",
                    "line": [
                        "Jalan Jati Asih"
                    ],
                    "city": "Jakarta",
                    "postalCode": "55292",
                    "country": "ID",
                    "extension": [
                        {
                            "url": "https://fhir.kemkes.go.id/r4/StructureDefinition/administrativeCode",
                            "extension": [
                                {
                                    "url": "province",
                                    "valueCode": "31"
                                },
                                {
                                    "url": "city",
                                    "valueCode": "3171"
                                },
                                {
                                    "url": "district",
                                    "valueCode": "317101"
                                },
                                {
                                    "url": "village",
                                    "valueCode": "31710101"
                                }
                            ]
                        }
                    ]
                }
            ],
            "partOf": {
                "reference": "Organization/10000004"
            }
        }';
        $client = new Client();
        $data2 = preg_replace('/\s+/', '', $data2);
        $url = $this->baseurl . "Organization";
        $token = $this->accesstoken();
        // try{
        $response = $client->request('POST', $url, [
            'headers' => $token,
            'body' => $data2,
            'allow_redirects' => true,
            'timeout' => 20
        ]);
        $response = json_decode($response->getBody());
        return $response;
        // }catch(ClientException){
        //     return 'RTO';
        // }
    }
}
