<x-app-layout>
    <x-slot name="header">
        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Cities') }}
                </h2>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <a href="{{ route('cities.create') }}" type="button"
                class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-adeptred-1 hover:bg-adeptred-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-adeptred-1">
                Create new City
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table id="vendors_table" class="min-w-full divide-y divide-gray-200 stripe hover">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        City
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody x-max="2">
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <x-slot name="styles">
        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568; 			/*text-gray-700*/
                padding-left: 1rem; 		/*pl-4*/
                padding-right: 1rem; 		/*pl-4*/
                padding-top: .5rem; 		/*pl-2*/
                padding-bottom: .5rem; 		/*pl-2*/
                line-height: 1.25; 			/*leading-tight*/
                border-width: 2px; 			/*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7; 		/*border-gray-200*/
                background-color: #edf2f7; 	/*bg-gray-200*/
                font-size: 0.875rem;
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;	/*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button		{
                font-weight: 400;				/*font-bold*/
                border-radius: .25rem;			/*rounded*/
                border: 1px solid transparent;	/*border border-transparent*/
                font-size: 0.875rem;
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
                color: rgba(255, 255, 255, 1) !important;				/*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
                font-weight: 400;					/*font-bold*/
                border-radius: .25rem;				/*rounded*/
                background: #ed2039 !important;		/*bg-indigo-500*/
                border: 1px solid transparent;		/*border border-transparent*/
                font-size: 0.875rem;
            }

            .paginate_button .previous .disabled:hover,
            .paginate_button .next .disabled:hover {
                background: transparent !important;
                font-size: 0.875rem;
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #ed2039 !important; /*bg-indigo-500*/
            }

            .dataTables_filter {
                margin-bottom: 2rem !important
            }

            /* table.dataTable thead th, table.dataTable thead td {
                border: 0 !important
            } */
        </style>
    </x-slot>

    <x-slot name="scripts">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#vendors_table').DataTable( {
                        responsive: true,
                        order: [[0, 'desc']],
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('cities.index') }}"
                        },
                        columns: [
                            {data: 'id'},
                            {data: 'title', responsivePriority: -1},
                            {data: 'district'},
                            {data: 'status'},
                            {data: 'actions', responsivePriority: -2},
                        ],
                        columnDefs: [
                            {
                                targets: 0,
                                visible: false,
                            },
                            {
                                targets: 1,
                                class: 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900',
                            },
                            {
                                targets: 2,
                                class: 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900',
                            },
                            {
                                targets: 3,
                                class: 'px-6 py-4 whitespace-nowrap text-sm text-gray-500',
                                orderable: false,
                                searchable: false,
                                render: function(data, type, full, meta) {
                                    var status = {
                                        1: {'title': 'Enabled', 'class': ' bg-green-100 text-green-800'},
                                        0: {'title': 'Disabled', 'class': ' bg-red-100 text-red-800'},
                                    };
                                    if (typeof status[data] === 'undefined') {
                                        return data;
                                    }
                                    return '<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium' + status[data].class + '">' + status[data].title + '</span>';
                                },
                            },
                            {
                                targets: -1,
                                title: 'Actions',
                                orderable: false,
                                searchable: false,
                                class: 'px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex',
                                render: function(data, type, full, meta) {
                                    return '\
                                        <a href="cities/'+full.id+'/edit" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white-700 bg-white hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">\
                                            Edit\
                                        </a>\
                                        <form method="POST" class="inline-flex" action="cities/'+full.id+'">\
                                        @csrf\
                                        @method("DELETE")\
                                        <button  onclick="event.preventDefault();this.closest(`form`).submit();" type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">\
                                            Delete\
                                        </button>\
                                        </form>\
                                    ';
                                },
                            },
                        ]
                    } )
                    .columns.adjust()
                    .responsive.recalc();
            } );

        </script>
    </x-slot>
</x-app-layout>
