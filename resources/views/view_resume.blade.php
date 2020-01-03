@extends('layouts.dashboard')

@section('content')

<style type="text/css">
    #sailorTableArea {
        max-height: 300px;
        overflow-x: auto;
        overflow-y: auto;
    }

    #sailorTable {
        white-space: normal;
    }

    tbody {
        display: block;
        height: 200px;
        overflow: auto;
    }

    thead,
    tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }
</style>
<button onclick="window.location.href = '{{ URL::to('generate-docx') }}'">Export as .doc</button>
<button type="button" data-toggle="modal" data-target="#exampleModal">
    Upload Your CV
</button>
@include('modal.resume_upload')

<div class="col-md-12 WordSection1">
    <table class="table table-image" id="exportContent">
        <tbody>
            <tr class="row">
                <th class="col-sm-9">
                    <h3>Resume </h3>
                    <p>Address: {{ $address->present_add }}, {{ $address->permanent_add }} </p>
                    <p>Mobile No 1: {{$personaldetails->mobile1}}</p>
                    <p>Mobile No 2 : {{$personaldetails->mobile2}}</p>
                    <p>e-mail : {{$personaldetails->email}}, {{$personaldetails->email2}}</p>
                </th>
                <td>
                    @if($images->photograph)
                    <img src="{{ asset('images/'. $images->photograph )}}" style=" vertical-align: middle; height: 220px; width: 200px;" class="img-fluid img-thumbnail" alt="Sheep">
                    @else
                    <img id="image_preview_container" src="{{ asset('/images/download.png') }}" alt="preview image" style="max-height: 150px;">
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    @if($career->objective != NULL)
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="background-color: #d8d8f0;" scope="row">Career Objective:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $career->objective }}</th>

            </tr>
        </tbody>
    </table>
    @endif

    @if($career_summery->summery != NULL)
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="background-color: #d8d8f0;" scope="row">Career Summary:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $career_summery->summery}}</th>

            </tr>
        </tbody>
    </table>
    @endif
    @if($career_summery->qualification != NULL)
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="background-color: #d8d8f0;" scope="row">Special Qualification:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $career_summery->qualification }}</th>

            </tr>
        </tbody>
    </table>
    @endif

    @if(@empty($employments))
    <div>
        <h3>Employment History </h3>
    </div>
    @foreach($employments as $history )
    <table class="table table-bordered">

        <thead>
            <tr>
                <th scope="col">{{ $history->responsibilities}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <p>Company Name: {{ $history->com_name }}</p>
                    <p>Company Location : {{ $history->com_loaction }}</p>
                    <p>Designation : {{ $history->designation}} </p>
                </th>
            </tr>
        </tbody>
    </table>
    <br>
    @endforeach
    @endif

    @if(@empty($education_level))
    <table class="table table-bordered">
        <h3>Academic Qualification:</h3>

        <thead>
            <tr>
                <th scope="col">Exam Title</th>
                <th scope="col">Concentration/Major</th>
                <th scope="col">Institute</th>
                <th scope="col">Result</th>
                <th scope="col">Pas.Year</th>
                <th scope="col">Duration</th>
                <th scope="col">Achievement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($education_level as $education)
            <tr>
                <td>{{ $education->education_level }} </td>
                <td>{{ $education->major_group  }} </td>
                <td>{{ $education->Institute }} </td>
                <td> {{ $education->result }}</td>
                <td>{{ $education->passing_year }} </td>
                <td>{{ $education->duration }} </td>
                <td>{{ $education->achievement }} </td>
            </tr>
            @endforeach
        </tbody>
        <br>

    </table>
    <br>
    @endif

    @if(!empty($training_title))
    <table class="table table-bordered">
        <h3>Training Summary:</h3>
        <thead>
            <tr>
                <th scope="col">Training Title</th>
                <th scope="col">Training Country </th>
                <th scope="col">Training Topics </th>
                <th scope="col">Training Years </th>
                <th scope="col">Training Inst. </th>
                <th scope="col">Training Period </th>
                <th scope="col">Training Location </th>
            </tr>
        </thead>
        <tbody>
            @foreach($training_title as $training )
            <tr>
                <th scope="row">{{ $training->training_title }}</th>
                <td>{{ $training->training_country  }} </td>
                <td>{{ $training->training_topics }} </td>
                <td>{{ $training->training_year }}</td>
                <td>{{ $training->training_inst }} </td>
                <td>{{ $training->training_period  }} </td>
                <td>{{ $training->training_locate }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <br>

    @if(@empty($education_level))
    <table class="table table-bordered">
        <h3>Professional Qualification:</h3>
        <thead>
            <tr>
                <th scope="col">Certificate </th>
                <th scope="col">Certificate Loaction </th>
                <th scope="col">Certificate Period</th>
                <th scope="col">Certificate Institiute </th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificate as $certifi)
            <tr>
                <th scope="row">{{ $certifi->certificate }} </th>
                <td>{{ $certifi->certificate_location }} </td>
                <td>{{ $certifi->certificate_period }} </td>
                <td>{{ $certifi->certificate_location_inst }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($career != NULL )
    <table class="table">
        <h3>Career and Application Information:</h3>
        <thead>

        </thead>
        <tbody>
            <tr>
                <td>
                    <p>Looking For : {{ $career->looking_for }} </p>
                    <p>Available For : {{ $career->job_nature}}</p>
                    <p>Expected Salary : {{ $career->exp_sallary}}</p>
                    <p>Preferred Job Category : {{ $prefer_jobs->job_categories }}</p>
                    <p>Preferred District : {{$prefer_jobs->job_location }}</p>
                </td>

            </tr>

        </tbody>
    </table>
    @endif

    <table class="table table-bordered">
        <h3>Specialization:</h3>
        <thead>
            <tr>
                <th scope="col">Fields of Specialization</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specials as $value )
            <tr>
                <td>{{ $value-> skill }}</td>
                <td>{{ $value-> skill_description  }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <table class="table table-bordered">
        <h3>Language Profeciency </h3>
        <thead>
            <tr>
                <th scope="col">Language</th>
                <th scope="col">Reading</th>
                <th scope="col">Writing</th>
                <th scope="col">Speaking</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
            <tr>
                <td>{{ $language->language }}</td>
                <td>{{ $language->reading }}</td>
                <td>{{ $language->writing }}</td>
                <td>{{ $language->speaking  }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-borderless">
        <h3>Personal Details :</h3>
        <thead>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <p>Father's Name : {{ $personaldetails->father_name }} </p>
                    <p>Mother's Name : {{ $personaldetails->mother_name }}</p>
                    <p>Date of Birth : {{ $personaldetails->dob }} </p>
                    <p>Gender : {{ $personaldetails->gender  }}</p>
                    <p>Marital Status : {{ $personaldetails->maritial }}</p>
                    <p>Nationality : {{ $personaldetails->nationality }} </p>
                    <p>National Id No. : {{ $personaldetails->nid  }}</p>
                    <p>Religion : {{ $personaldetails->religion  }}</p>
                    <p>Current Location : {{ $address->present_add }} </p>
                </th>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"> Reference: 01</th>
                <th scope="col"> Reference: 02</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>Name</p>
                    <p>Organization</p>
                    <p>Designation</p>
                    <p>Address</p>
                    <p>Mobile.</p>
                    <p>E-Mail.</p>
                    <p>Relation</p>
                </td>
                @foreach($reference as $ref )
                <td>
                    <p>{{$ref->ref_name }}</p>
                    <p>{{ $ref->ref_organization }}</p>
                    <p>{{ $ref->ref_designation }}</p>
                    <p>{{ $ref->re_address }}</p>
                    <p>{{ $ref->ref_mobile }}</p>
                    <p>{{ $ref->ref_email }}</p>
                    <p>{{ $ref->ref_relation }}</p>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>

</div>
<script>
    function Export2Doc(element, filename = '') {
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml + document.getElementById(element).innerHTML + postHtml;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        // Specify link url
        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

        // Specify file name
        filename = filename ? filename + '.doc' : 'document.doc';

        // Create download link element
        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = url;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }
</script>
@endsection
