@extends('layouts.app')

@section('content')
    <h3 class="page-title">Kerkesa</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Klienti</th>
                            <td field-key='room_number'>{{ $request->name }}</td>
                        </tr>
                        <tr>
                            <th>Nr dhomes / Kati / Pershkrimi</th>
                            <td field-key='floor'>{{ $request->room_number }} / {{ $request->floor }} / {{ $request->description }}</td>
                        </tr>
                        <tr>
                            <th>Check in</th>
                            <td field-key='time_from'>{{ $request->time_from }}</td>
                        </tr>
                        <tr>
                            <th>Check out</th>
                            <td field-key='time_to'>{{ $request->time_to }}</td>
                        </tr>

                         <tr>
                            <th>Phone / Email</th>
                            <td field-key='phone_email'>{!! $request->email !!} // {!! $request->phone !!}</td>
                        </tr>

                         <tr>
                            <th>Info shtese</th>
                            <td field-key='notes'>{!! $request->notes !!}</td>
                        </tr>


                    </table>
                </div>
            </div><!-- Nav tabs -->
           

           

            <p>&nbsp;</p>

            <a href="{{ route('admin.requests.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
