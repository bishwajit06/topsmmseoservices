@extends('layouts.backend.master')

@section('title','')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />
@endpush

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> All PAGES</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <div class="adv-table">
                            <table class="table table-striped table-advance table-hover" id="hidden-table-info">
                                <h4><i class="fa fa-angle-right"></i> <a href="{{route('admin.page.create')}}" class="btn btn-theme"> Add Page</a></h4>
                                <br>
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Page Name</th>
                                    <th>Image</th>
                                    <th>Descrition</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $key => $page)
                                <tr>
                                    <td class="hidden-phone"> {{ $key + 1 }}</td>
                                    <td>
                                    <a href="{{route('page.details',$page->slug)}}" target="_blank"> {{$page->name}}</a>
                                    </td>
                                    <td>
                                        @if($page->image)
                                            <img style="height: 40px;" src="{{ asset('storage/page/'.$page->image) }}"/>
                                        @else
                                        <img style="height: 40px;" src="{{asset('assets/backend/img/demo_image.png')}}" alt="" />
                                        @endif
                                    </td>

                                    <td class="hidden-phone"> {{ Str::limit($page->body,40) }}</td>

                                    <td>
                                        <a href="{{route('admin.page.edit',$page->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-xs" onclick="deletePage({{ $page->id }})"><i class="fa fa-trash-o "></i></button>
                                        <form id="delete-form-{{ $page->id }}" action="{{ route('admin.page.destroy',$page->id) }}" method="post" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
@endsection

@push('js')
    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" language="javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        function deletePage(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <!--script for this page-->
    <script type="text/javascript">
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
            sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
            sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '<img src="{{asset('assets/backend/lib/advanced-datatable/images/details_open.png')}}">';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });

            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            $('#hidden-table-info tbody td img').live('click', function() {
                var nTr = $(this).parents('tr')[0];
                if (oTable.fnIsOpen(nTr)) {
                    /* This row is already open - close it */
                    this.src = "{{asset('assets/backend/lib/advanced-datatable/media/images/details_open.png')}}";
                    oTable.fnClose(nTr);
                } else {
                    /* Open this row */
                    this.src = "{{asset('assets/backend/lib/advanced-datatable/images/details_close.png')}}";
                    oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
                }
            });
        });
    </script>
@endpush
