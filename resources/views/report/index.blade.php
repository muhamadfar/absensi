@extends('layout.admin')

@push('css')
    <style>
        html {
            font-size: 15px;
        }

        body {
            /* font-family: sans-serif; */
            font-size: 1em;
            line-height: 1.4;
            color: #444;
        }

        main {
            max-width: 1000px;
            margin: 0 auto;
        }

        .table-wrapper {
            overflow: auto;
        }

        .text-center {
            text-align: center;
        }

        .table-siswa,
        .table-date {
            border-collapse: collapse;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .table-siswa td {
            border: 1px solid silver;
            position: relative;
            padding: 5px;
        }

        .td-date .date {
            display: inline-block;
            width: 25px;
        }

        .label-checkbox {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            height: 100%;
            display: block;
            vertical-align: middle;
            background: #cecece;
        }

        .label-checkbox:hover {
            background: #bff8ff;
        }

        .label-checkbox input {
            margin: 0;
            -webkit-appearance: none;
            height: 100%;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            width: 100%;
            border: 0;
            cursor: pointer;
            outline: none;
        }

        .label-checkbox.active,
        .label-checkbox.active input,
        .label-checkbox input:checked {
            background: #2196F3;
        }

        .label-checkbox.active::before {
            content: "✓";
            display: block;
            position: absolute;
            z-index: 5;
            color: #fff;
            top: 15%;
            left: 35%;
        }


        .box-color {
            display: inline-block;
            width: 1em;
            height: 1em;
            vertical-align: middle;
        }

        .box-color.true {
            background: #2196F3;
        }

        .box-color.false {
            background: #cecece;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="card shadow mb-4">
            <div class="content-header">
                <div class="container-fluid p-2">
                    <div class="card-tools">
                        <select name="date" id="nama">
                            <option value="" disabled selected>--Pilih Bulan--</option>
                            <option value="">Januari</option>
                            <option value="">Februari</option>
                            <option value="">Maret</option>
                            <option value="">April</option>
                            <option value="">Mei</option>
                            <option value="">Juni</option>
                            <option value="">Juli</option>
                            <option value="">Agustus</option>
                            <option value="">September</option>
                            <option value="">Oktober</option>
                            <option value="">November</option>
                            <option value="">Desember</option>
                        </select>
                        <a href="{{ route('presences.index') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>

                    <div class="card-body pt-5">
                        <table class="table-siswa">
                            <thead>
                                <tr>
                                    <td rowspan="2">No</td>
                                    <td rowspan="2">Nama</td>
                                    <td colspan="31" class="text-center">Tanggal</td>
                                    <td colspan="2">Jumlah</td>
                                </tr>
                                <tr class="table-row-head">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <td>{{ $i }}</td>
                                    @endfor
                                    <td>Hadir</td>
                                    <td>Tidak Hadir</td>
                                </tr>
                                @foreach ($presences as $presence)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $presence->nama }}</td>
                                        <td>{{ $presence->date }}</td>
                                        @for ($i = 1; $i <= 31; $i++)
                                        @endforeach
                                    </tr>
                                    </tbody>
                            </thead>
                        </table>
                    </div>

                    <h4>Keterangan</h4>

                    <ul>
                        <li><span class="box-color true"></span> Hadir</li>
                        <li><span class="box-color false"></span> Tidak Hadir</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        json file example
            [{
                "id": 001,
                "name": "Adi",
                "gender"
                "L",
                "data": [...]
            }, {
                "id": 002,
                "name": "Budi",
                "gender"
                "L",
                "data": [....]
            }, {
                "id": 003,
                "name": "Wati",
                "gender"
                "P",
                "data": [....]
            }]


        $(document).ready(function() {

            var tableDate = "";
            var tableContent = "";
            var $td = "";

            var $label = "<label class='label-checkbox'><input type='checkbox'/></label>";

            for (var i = 1; i <= 31; i++) {
                tableDate += "<td class='td-date text-center'><b class='date'>" + i + "</b></td>";
            }

            $(tableDate).prependTo(".table-row-head");


            for (var i = 1; i <= 31; i++) {
                tableContent += "<td class='text-center' data-date='" + i + "'>" + $label + "</td>";
            }

            $(tableContent).appendTo(".table-body-content tr");

            for (var td = 1; td <= 2; td++) {
                $td += "<td class='text-center' data-info='" + td + "'</td>";
            }

            $($td).insertAfter(".table-body-content td[data-date='31']");


            $(document).on("change", ".label-checkbox", function() {
                $(this).toggleClass("active");
                checkData();
            });


        });

        function checkData() {
            $(".label-checkbox").each(function() {
                var $parents = $(this).parents("tr");
                var $checked = $parents.find("input:checked").length;
                var $no_checked = $parents.find("input").length;
                var $true = $checked;
                var $false = [$no_checked - $checked];

                $parents.find("[data-info='1']").html($true);
                $parents.find("[data-info='2']").html($false);
            });
        }

        $(document).ready(function() {
            checkData();
        });
    </script>
@endpush
