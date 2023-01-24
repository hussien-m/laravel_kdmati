@extends('layouts.dashboard.dashboard')

@section('styles')
@endsection

@section('content')

    @include('dashboard.users.filter.filter')

    <div class="card">

        <div id="table_data">
            <div class="table-responsive">

                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الحالة</th>
                            <th>البريد الالكتروني</th>
                            <th>أنشئ في</th>
                            <th>احداث</th>

                        </tr>
                    </thead>
                    <tbody>
                        @include('dashboard.users.pagination_data')
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@stop

@section('scripts')
<script src="{{ asset('dashboard/assets/js/dashboard/users.js') }}"></script>
@endsection
