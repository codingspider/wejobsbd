
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>resume</title>
    <style>
        @font-face {
            font-family: 'Nunito';
            font-style: normal;
            font-weight: 400;
            src: local('Nunito Regular'), local('Nunito-Regular'), url(nunito.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        * {
            font-family: nunito, Arial, Helvetica, sans-serif;
            text-align: left;
            page-break-inside : avoid;
        }

        body {
            margin: 40px;
        }

        h3 {
            padding: 10px;
            ;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        img {
            vertical-align: middle;
            height: 220px;
            width: 200px;
        }

        .color th,
        p {
            padding: 10px;
            margin: 0px;
        }

        .color>thead {
            background-color: #D8D8F0;
        }

        .color>tbody {
            background-color: #f2f2f2;
        }

        .border th,
        p {
            padding: 10px;
        }

        .border th,
        .border td {
            border: 1px solid #f2f2f2;
        }

        .title {
            font-size: 22px;
        }

        .border_bottom {
            border-bottom: 1px solid #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- top table -->
    <table>
        <tbody>
            <tr>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <h3>Resume of {{ $personaldetails->first_name }} {{ $personaldetails->last_name }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Address: {{ $address->present_add }}, {{ $address->permanent_add }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Mobile No 1:  {{$personaldetails->mobile1}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Mobile No 2 : {{$personaldetails->mobile2}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>e-mail : {{$personaldetails->email}}, {{$personaldetails->email2}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <img src="{{ public_path('images/') . $images->photograph }}" alt=""/>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- top table end -->
    <br><br>
    <!-- Career Objective: -->
    @if($career->objective != NULL)
    <table class="color">
        <thead>
            <tr>
                <th>Career Objective:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>{{ $career->objective }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <!-- Career Objective end -->
    <br><br>
    <!-- Career Summary: -->
       @if($career_summery->summery != NULL)
    <table class="color">
        <thead>
            <tr>
                <th>Career Summary:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>{{ $career_summery->summery}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <!-- Career Summary end -->
    <br><br>
    <!-- Special Qualification: -->
    @if($career_summery->qualification != NULL)
    <table class="color">
        <thead>
            <tr>
                <th>Special Qualification:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>{{ $career_summery->qualification }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    @endif
    <!-- Special Qualification end -->
    <!-- Training Summary: -->
    @if(!empty($employments))

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Employment History</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employments as $history )
            <tr>
                <th scope="row">
                    <p>Company Name: {{ $history->com_name }}</p>
                    <p>Company Location : {{ $history->com_loaction }}</p>
                    <p>Designation : {{ $history->designation}} </p>
                </th>
            </tr>
             @endforeach
        </tbody>
    </table>
    <br>

    @endif
    <br>
  @if(!empty($education_level))

    <table>
        <thead>
            <tr>
                <th><span class="title">Education Qualification:</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>Exam Title</th>
                                <th>Concentration/Major</th>
                                <th>Institute</th>
                                <th>Result</th>
                                <th>Pas.Year</th>
                                <th>Duration</th>
                                <th>Achievement</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($education_level as $education )
                            <tr>
                               <!-- <td>{{ $education->education_level }} </td>
                                <td>{{ $education->major_group  }} </td>
                                <td>{{ $education->Institute }} </td>
                                <td> {{ $education->result }}</td>
                                <td>{{ $education->passing_year }} </td>
                                <td>{{ $education->duration }} </td>
                                <td>{{ $education->achievement }} </td> -->

                                <td>
                                    <p>{{ $education->education_level }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->major_group  }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->Institute }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->result }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->passing_year }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->duration }}</p>
                                </td>
                                <td>
                                    <p>{{ $education->achievement }}</p>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
 @endif
 <br>
 <br>
    <table>
        <thead>
            <tr>
                <th><span class="title">Training Summary:</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>Training Title</th>
                                <th>Training Country</th>
                                <th>Training Topics</th>
                                <th>Training Years</th>
                                <th>Training Inst.</th>
                                <th>Training Period</th>
                                <th>Training Location</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($training_title as $training )
                            <tr>
                                 <td>
                                    <p>{{ $training->training_title }}</p>
                                </td>
                                <td>
                                    <p>{{ $training->training_country  }}</p>
                                </td>
                                <td>
                                    <p>{{ $training->training_topics }} </p>
                                </td>
                                <td>
                                    <p>{{ $training->training_year }}</p>
                                </td>
                                <td>
                                    <p>{{ $training->training_institute }}</p>
                                </td>
                                <td>
                                    <p>{{ $training->training_duration  }}</p>
                                </td>
                                <td>
                                    <p>{{ $training->training_location }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Training Summary end -->
    <br><br>
    <!-- Career and Application Information: -->
    <table>
        <thead class="border_bottom">
            <tr>
                <th>
                    <span class="title">Career and Application Information:</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table>
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
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Career and Application Information: -->
    <br><br>
    <!-- Specialization: -->
    <table>
        <thead>
            <tr>
                <th><span class="title">Specialization:</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>Fields of Specialization</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($specials as $value )
                            <tr>
                                <td>{{ $value->skill }}</td>
                                <td>{{ $value->description  }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Specialization end -->
    <br><br>
    <!-- Language Profeciency: -->
    <table>
        <thead>
            <tr>
                <th><span class="title">Language Profeciency:</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Reading</th>
                                <th>Writing</th>
                                <th>Speaking</th>
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
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Language Profeciency end -->
    <br><br>
    <!-- Personal Details -->
    <table>
        <thead>
            <tr>
                <th><span class="title">Personal Details:</span></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <td>
                                   <p>Father's Name : {{ $personaldetails->father_name }} </p>
                                    <p>Mother's Name : {{ $personaldetails->mother_name }}</p>
                                    <p>Date of Birth : {{ $personaldetails->dob }} </p>
                                    <p>Gender : {{ $personaldetails->gender  }}</p>
                                    <p>Marital Status : {{ $personaldetails->maritial }}</p>
                                    <p>Nationality : {{ $personaldetails->nationality }} </p>
                                    <p>National Id No. : {{ $personaldetails->nid  }}</p>
                                    <p>Religion : {{ $personaldetails->religion  }}</p>
                                    <p>Current Location : {{ $address->present_add }} </p>
                                </td>
                            </tr>

                        </thead>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Personal Details end -->
    <br><br>
    <!-- Reference: -->
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
    <!-- Reference end -->
</body>

</html>
