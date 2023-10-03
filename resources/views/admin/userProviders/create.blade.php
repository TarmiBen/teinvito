    @extends('layouts.users.app')
    @section('content')
    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('admin.userProviders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('layouts.users.alert')
                        <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-sm-0">
                            <label for="users_id"><span class="text-danger">*</span> Asignar Usuario:</label>
                            <input required type="text" class="form-control" id="searchUser" name="usersId" autocomplete="off" placeholder="Asignar Usuario">
                            <input type="hidden" id="usersId" name="usersId">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-sm-0">
                            <label for="company_id"><span class="text-danger">*</span> Asignar Compañia:</label>
                            <input required type="text" class="form-control" id="searchCompany" autocomplete="off" placeholder="Asignar Usuario">
                            <input type="hidden" id="companyId" name="companyId">
                        </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/assets/vendor/typeahead.js/typeahead.bundle.min.js"></script>
    <script>
        var route = "{{ url('/autoCompleteUser/json?q=%QUERY') }}";
        var clave = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: route,
                wildcard: '%QUERY',
            }
        });
        $('#searchUser').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'Usuario',
            displayKey: 'name',
            limit: 9,
            source: clave.ttAdapter(),
            templates: {
                suggestion: function (data) {
                    return '<div class="typeahead-results">' + data.name + '-' + data.email + '</div>';
                },
                    empty: [
                    '<div class="typeahead-results">'+'Sin Resultados'+'</div>'
                ]
            },
        }).on('typeahead:selected', function (e, data) {
            $('#usersId').val(data.id);
        });
    </script>
    <script>
        var route = "{{ url('/autoCompleteCompany/json?q=%QUERY') }}";
        var clave = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: route,
                wildcard: '%QUERY',
            }
        });
        $('#searchCompany').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'Company',
            displayKey: 'name',
            limit: 9,
            source: clave.ttAdapter(),
            templates: {
                suggestion: function (data) {
                    return '<div class="typeahead-result">' + data.name + '</div>';
                },
                    empty: [
                    '<div class="typeahead-result">'+'Sin Resultados'+'</div>'
                ]
            },
        }).on('typeahead:selected', function (e, data) {
            $('#companyId').val(data.id);
        });
    </script>
    @endsection