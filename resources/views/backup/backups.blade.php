@extends('layouts.app')

@section('breadcrumb')
    <div class="container -body-block pb-5">
        @card(['title' => 'Backups de la base de datos'])
         
                <li class="nav-item active mr-3">
                    <a href="{{ url('backup/create') }}" class="nav-link text-primary" title="Crear nuevo backup">
                        <i class="far fa-plus" aria-hidden="true"></i> Crear nuevo backup
                    </a>
                </li>
           
            <div class="py-4"></div>
            @include('backup.backups-table')
            <div class="py-3"></div>
        @endcard
    </div>
@endsection