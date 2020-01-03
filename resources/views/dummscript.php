 <script>
               $(document).ready(function(){
                  //load_data();
                          var count = 1;
                          // function load_data()
                          // {
                          //     $.ajax({
                          //         url:"/dashboard/fetch/data",
                          //         method:"GET",
                          //         dataType: "html",
                          //         success:function(response)
                          //         {
                          //             $('#result').html(response);
                          //         }
                          //     })
                          // }
                          function add_dynamic_input_field(count)
                        {
                            var button = '';
                            if(count > 1)
                            {
                                button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">x</button>';
                            }
                            else
                            {
                                button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
                            }
                            output = '<tr id="row'+count+'">';
                            output += '<td>  <div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Level of Education</label><select class="form-control name_list" id="education_level" name="education_level[]"><option value="nothing select">Select</option><option value="psc">PSC/5 pass</option><option value="jsc">JSC/JDC/8 pass</option><option value="secondary">Secondary</option><option value="higher">Higher Secondary</option><option value="diploma" selected="">Diploma</option><option value="bachelor">Bachelor/Honors</option><option value="master">Masters</option><option value="phd">PhD (Doctor of Philosophy)</option></select></div><div class="form-group col-md-6"><label for="inputPassword4">Result </label><select class="form-control" id="result" name="result[]"><option value="nothing select">Select</option><option value="first_class">First Division/Class</option><option value="second_class">Second  Division/Class</option><option value="third_class">Third Division/Class</option><option value="grade">Grade</option><option value="appeared">Appeared</option><option value="enrolled">Enrolled</option><option value="awarded">Awarded</option><option value="do_not_mention">Do not mention</option><option value="passed" selected="Passed">Pass</option></select></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Exam/Degree Title</label><input type="text" class="form-control" id="exam_degree" name="exam_degree[]" ></div><div class="form-group col-md-6"><label for="inputPassword4">Year of Passing </label><select class="form-control" id="year" name="year[]"><?php for($i = 1950 ; $i < date(' Y '); $i++){echo "<option>$i</option>";}?></select></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Concentration/ Major/Group </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="major_group[]" id="major_group" ></div><div class="form-group col-md-6"><label for="inputPassword4">Duration (Years)</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="duration[]" id="duration"></div></div><div class="form-row"><div class="form-group col-md-6"><label for="inputEmail4">Board </label><select class="form-control" id="education_board" name="education_board[]"><option value=""selected>Select One</option><option value="barisal">Barisal</option><option value="chittagong">Chittagong</option><option value="comilla">Comilla</option><option value="dhaka">Dhaka</option><option value="dinajpur">Dinajpur</option><option value="jessore">Jessore</option><option value="rajshahi">Rajshahi</option><option value="sylhet">Sylhet</option><option value="madrasah">Madrasah</option><option value="tec">Technical</option><option value="dibs">DIBS(Dhaka)</option></select></div><div class="form-group col-md-6"><label for="inputPassword4">Institute Name </label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="institute[]" id="institute"></div></div><div class="form-row"> <div class="form-group col-md-6"><label for="inputPassword4">Achievement</label><input type="text" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" name="achievement[]" id="achievement"></div></div> </td>';
                            output += '<td align="center">'+button+'</td></tr>';
                            $('#dynamic_field').append(output);
                        }
                            $('#add').click(function(){
                            $('#dynamic_field').html('');
                            add_dynamic_input_field(1);
                            $('.modal-title').text('Add Details');
                            $('#action').val("insert");
                            $('#submit').val('Submit');
                            $('#add_name')[0].reset();
                            $('#dynamic_field_modal').modal('show');
                        });

                    $(document).on('click', '#add_more', function(){
                        count = count + 1;
                        add_dynamic_input_field(count);
                    });

                    $(document).on('click', '.remove', function(){
                        var row_id = $(this).attr("id");
                        $('#row'+row_id).remove();
                    });


                    $('#add_name').on('submit', function(event){
                    event.preventDefault();
                    if($('#education_level').val() == '')
                    {
                        alert("Enter Your details below.");
                        return false;
                    }
                    var education_level = 0;
                    $('.name_list').each(function(){
                        if($(this).val() != '')
                        {
                            education_level = education_level + 1;
                        }
                    });

                    if(education_level > 0)
                    {
                        var form_data = $(this).serialize();

                        var action = $('#action').val();

                        $.ajax({
                            url:"/dashboard/academic/details",
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                                if(action == 'insert')
                                {
                                    alert("Data Inserted");
                                }
                                if(action == 'edit')
                                {
                                    alert("Data Edited");
                                }
                                add_dynamic_input_field(1);
                                load_data();

                                $('#add_name')[0].reset();
                                $('#dynamic_field_modal').modal('hide');
                            }
                        });
                    }
                    else
                    {
                        alert("Please Enter at least one academic details");
                    }
                });

              
                }); 
                </script>