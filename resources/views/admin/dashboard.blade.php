@extends('main')

@section('content')
    {{-- ── CSS Tambahan ── --}}
    <style>
        /* === WARNA TEMA === */
        :root {
            --pk: #22c55e;
            --pk-soft: #ecfdf5;
            --pk-mid: #bbf7d0;
            --pk-dark: #15803d;
            --pk-deep: #14532d;
        }

        /* === PAGE HEADER === */
        .page-title-rs {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 1.25rem;
        }

        .page-title-rs h3 {
            font-size: 20px;
            font-weight: 700;
            color: #111;
            margin: 0;
        }

        .breadcrumb-rs {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #9ca3af;
            list-style: none;
            padding: 0;
            margin: 4px 0 0;
        }

        .breadcrumb-rs a {
            color: var(--pk);
            text-decoration: none;
        }

        .breadcrumb-rs .sep {
            color: #d1d5db;
        }

        /* === STAT CARDS === */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin-bottom: 1.25rem;
        }

        .stat-card {
            background: #fff;
            border-radius: 14px;
            border: 0.5px solid #e5e7eb;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: border-color .2s;
        }

        .stat-card:hover {
            border-color: var(--pk-mid);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .stat-icon.pink {
            background: var(--pk-soft);
            color: var(--pk);
        }

        .stat-icon.green {
            background: #f0fdf4;
            color: #16a34a;
        }

        .stat-icon.yellow {
            background: #fefce8;
            color: #ca8a04;
        }

        .stat-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-body .label {
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .stat-body .value {
            font-size: 22px;
            font-weight: 700;
            color: #111;
            line-height: 1.1;
        }

        /* === FILTER PANEL === */
        .filter-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--pk);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
            font-family: inherit;
        }

        .filter-toggle-btn:hover {
            background: var(--pk-dark);
        }

        .filter-toggle-btn .chevron {
            transition: transform .35s cubic-bezier(.22, .61, .36, 1);
            width: 14px;
            height: 14px;
        }

        .filter-toggle-btn.open .chevron {
            transform: rotate(180deg);
        }

        /* Filter Panel Animate */
        .filter-panel-wrap {
            overflow: hidden;
            max-height: 0;
            transition: max-height .42s cubic-bezier(.22, .61, .36, 1);
        }

        .filter-panel-wrap.open {
            max-height: 400px;
        }

        .filter-panel-inner {
            background: #fff;
            border: 0.5px solid var(--pk-mid);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1rem;
        }

        .filter-panel-inner .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 14px 20px;
        }

        .filter-group .filter-label {
            font-size: 11px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: .07em;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-input-wrap {
            display: flex;
            align-items: center;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
            transition: border-color .2s, box-shadow .2s;
            background: #fff;
        }

        .filter-input-wrap:focus-within {
            border-color: var(--pk);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, .1);
        }

        .filter-input-icon {
            width: 38px;
            height: 40px;
            background: var(--pk-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1.5px solid var(--pk-mid);
            flex-shrink: 0;
            color: var(--pk);
            font-size: 13px;
        }

        .filter-input-wrap input,
        .filter-input-wrap select {
            flex: 1;
            height: 40px;
            border: none;
            outline: none;
            padding: 0 12px;
            font-size: 13px;
            color: #374151;
            background: transparent;
            font-family: inherit;
        }

        /* Active filter chips */
        .filter-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 0.5px solid var(--pk-mid);
            flex-wrap: wrap;
            gap: 8px;
        }

        .active-chips {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--pk-soft);
            color: var(--pk-deep);
            border: 0.5px solid var(--pk-mid);
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
        }

        .chip-label {
            font-size: 11px;
            color: #9ca3af;
        }

        .btn-reset {
            background: none;
            border: none;
            font-size: 12px;
            color: #9ca3af;
            cursor: pointer;
            font-weight: 600;
            transition: color .2s;
            font-family: inherit;
        }

        .btn-reset:hover {
            color: var(--pk);
        }

        /* === CARD TABLE === */
        .card-rs {
            background: #fff;
            border-radius: 16px;
            border: 0.5px solid #e5e7eb;
            overflow: hidden;
        }

        .card-header-rs {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-bottom: 0.5px solid #f3f4f6;
            background: linear-gradient(90deg, var(--pk-soft) 0%, #fff 100%);
            flex-wrap: wrap;
            gap: 8px;
        }

        .card-header-rs .title-wrap h4 {
            font-size: 15px;
            font-weight: 700;
            color: var(--pk-dark);
            margin: 0;
        }

        .card-header-rs .title-wrap p {
            font-size: 12px;
            color: #9ca3af;
            margin: 2px 0 0;
        }

        /* === DATATABLE CUSTOM === */
        #laporan-table thead tr th {
            background: var(--pk) !important;
            color: #fff !important;
            font-size: 12px;
            font-weight: 600;
            border: none !important;
            white-space: nowrap;
            letter-spacing: .03em;
        }

        #laporan-table tbody tr:hover td {
            background: var(--pk-soft) !important;
        }

        #laporan-table.dataTable tbody td {
            font-size: 13px;
            vertical-align: middle;
            border-color: #f3f4f6;
            color: #374151;
        }

        /* Badge custom */
        .badge-diterima {
            background: #dcfce7 !important;
            color: #166534 !important;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-diproses {
            background: #fef9c3 !important;
            color: #854d0e !important;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-selesai {
            background: #dbeafe !important;
            color: #1e40af !important;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        /* Ticket number */
        .ticket-no {
            font-weight: 700;
            color: var(--pk-dark);
            font-size: 12px;
        }

        /* Action buttons */
        .btn-rs-edit {
            background: #fef9c3;
            color: #854d0e;
            border: none;
            border-radius: 7px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s;
        }

        .btn-rs-edit:hover {
            background: #fef08a;
            color: #713f12;
        }

        .btn-rs-del {
            background: #fee2e2;
            color: #991b1b;
            border: none;
            border-radius: 7px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-rs-del:hover {
            background: #fecaca;
        }

        /* DataTable override */
        .dataTables_wrapper .dataTables_filter input {
            border: 1.5px solid #e5e7eb !important;
            border-radius: 9px !important;
            padding: 5px 12px !important;
            font-size: 13px !important;
            outline: none !important;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--pk) !important;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, .1) !important;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1.5px solid #e5e7eb !important;
            border-radius: 9px !important;
            padding: 4px 8px !important;
            font-size: 13px !important;
        }

        .paginate_button.current,
        .paginate_button.current:hover {
            background: var(--pk) !important;
            border-color: var(--pk) !important;
            color: #fff !important;
            border-radius: 8px !important;
        }

        .paginate_button:hover {
            background: var(--pk-soft) !important;
            border-color: var(--pk-mid) !important;
            color: var(--pk-dark) !important;
            border-radius: 8px !important;
        }

        /* Daterangepicker override */
        .daterangepicker td.active,
        .daterangepicker td.active:hover {
            background-color: var(--pk) !important;
        }

        .daterangepicker td.in-range {
            background: var(--pk-soft) !important;
            color: var(--pk-deep) !important;
        }

        .daterangepicker .btn-primary {
            background: var(--pk) !important;
            border-color: var(--pk) !important;
        }

        @media (max-width: 640px) {
            .filter-panel-inner .filter-grid {
                grid-template-columns: 1fr;
            }

            .stat-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    {{-- DateRangePicker CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <div class="container">
        <div class="page-inner">

            {{-- ── PAGE HEADER ── --}}
            <div class="page-title-rs">
                <div>
                    <h3>Manajemen Laporan</h3>
                    <ul class="breadcrumb-rs">
                        <li><a href="#"><i class="icon-home"></i></a></li>
                        <li class="sep"><i class="icon-arrow-right"></i></li>
                        <li>Dashboard</li>
                        <li class="sep"><i class="icon-arrow-right"></i></li>
                        <li>Laporan</li>
                    </ul>
                </div>
                <button class="filter-toggle-btn" id="filterToggleBtn">
                    <i class="fas fa-sliders-h"></i>
                    Filter Data
                    <i class="fas fa-chevron-down chevron"></i>
                </button>
            </div>

            {{-- ── STAT CARDS ── --}}
            <div class="stat-grid mb-3">
                <div class="stat-card">
                    <div class="stat-icon pink"><i class="fas fa-ticket-alt"></i></div>
                    <div class="stat-body">
                        <div class="label">Total Tiket</div>
                        <div class="value" id="stat-total">{{ $laporans->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-body">
                        <div class="label">Diterima</div>
                        <div class="value" id="stat-diterima">{{ $laporans->where('status', 'Diterima')->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon yellow"><i class="fas fa-clock"></i></div>
                    <div class="stat-body">
                        <div class="label">Diproses</div>
                        <div class="value" id="stat-diproses">{{ $laporans->where('status', 'Diproses')->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="fas fa-flag-checkered"></i></div>
                    <div class="stat-body">
                        <div class="label">Selesai</div>
                        <div class="value" id="stat-selesai">{{ $laporans->where('status', 'Selesai')->count() }}</div>
                    </div>
                </div>
            </div>

            {{-- ── FILTER PANEL ── --}}
            <div class="filter-panel-wrap" id="filterPanelWrap">
                <div class="filter-panel-inner">
                    <div class="filter-grid">

                        {{-- Ruangan --}}
                        <div class="filter-group">
                            <div class="filter-label">
                                <i class="fas fa-door-open"></i> Ruangan
                            </div>
                            <div class="filter-input-wrap">
                                <div class="filter-input-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <select id="filter-ruangan">
                                    <option value="">Semua Ruangan</option>
                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Range Tanggal --}}
                        <div class="filter-group">
                            <div class="filter-label">
                                <i class="fas fa-calendar-alt"></i> Rentang Tanggal
                            </div>
                            <div class="filter-input-wrap">
                                <div class="filter-input-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <input type="text" id="filter-tanggal" placeholder="Pilih rentang tanggal" readonly
                                    style="cursor:pointer;">
                            </div>
                        </div>

                        {{-- Pelapor --}}
                        <div class="filter-group">
                            <div class="filter-label">
                                <i class="fas fa-user"></i> Cari Pelapor
                            </div>
                            <div class="filter-input-wrap">
                                <div class="filter-input-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" id="filter-pelapor" placeholder="Nama pelapor...">
                            </div>
                        </div>

                    </div>

                    {{-- Filter footer: active chips + reset --}}
                    <div class="filter-footer">
                        <div class="active-chips" id="activeChips">
                            <span class="chip-label">Filter aktif:</span>
                            <span id="no-filter-msg" style="font-size:12px; color:#9ca3af;">Tidak ada filter</span>
                        </div>
                        <button class="btn-reset" id="btnResetFilter">
                            <i class="fas fa-times" style="font-size:10px;"></i> Reset semua
                        </button>
                    </div>
                </div>
            </div>

            {{-- ── TABLE CARD ── --}}
            <div class="card-rs">
                <div class="card-header-rs">
                    <div class="title-wrap">
                        <h4><i class="fas fa-list-alt" style="margin-right:6px;"></i>Daftar Laporan</h4>
                        <p>Data laporan masalah IT seluruh unit</p>
                    </div>
                </div>
                <div class="card-body" style="padding: 1rem;">
                    <div class="table-responsive">
                        <table id="laporan-table" class="display table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Tiket</th>
                                    <th>Tanggal</th>
                                    <th>Pelapor</th>
                                    <th>Ruangan</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Dokumen</th>
                                    <th>Waktu Respons</th>
                                    <th>Waktu Selesai</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ── SCRIPTS ── --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {

            // ===================================================
            // 1. FILTER PANEL TOGGLE
            // ===================================================
            const toggleBtn = document.getElementById('filterToggleBtn');
            const panelWrap = document.getElementById('filterPanelWrap');

            toggleBtn.addEventListener('click', function() {
                panelWrap.classList.toggle('open');
                toggleBtn.classList.toggle('open');
            });

            // ===================================================
            // 2. DATERANGEPICKER (1 input, otomatis refresh)
            // ===================================================
            $('#filter-tanggal').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Hapus',
                    applyLabel: 'Terapkan',
                    format: 'DD/MM/YYYY',
                    daysOfWeek: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                    monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ],
                    firstDay: 1,
                },
                ranges: {
                    'Hari Ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Ini': [moment().subtract(6, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')],
                },
                showDropdowns: true,
            });

            // Terapkan dan langsung reload DataTable
            $('#filter-tanggal').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
                refreshTable();
                updateChips();
            });

            // Hapus range tanggal
            $('#filter-tanggal').on('cancel.daterangepicker', function() {
                $(this).val('');
                refreshTable();
                updateChips();
            });

            // ===================================================
            // 3. DATATABLE dengan server-side filter params
            // ===================================================
            var table = $('#laporan-table').DataTable({
                responsive: true,
                processing: true,
                paging: true,
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_–_END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data',
                    paginate: {
                        previous: '&laquo;',
                        next: '&raquo;'
                    },
                    processing: '<i class="fas fa-spinner fa-spin" style="color:var(--pk);"></i> Memuat...',
                    emptyTable: 'Tidak ada data yang sesuai filter',
                },
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: "{{ route('laporan.view') }}",
                    type: 'GET',
                    dataSrc: 'data',
                    data: function(d) {
                        // Kirim parameter filter ke controller
                        d.ruangan_id = $('#filter-ruangan').val();
                        d.range_tanggal = $('#filter-tanggal').val();
                        d.pelapor = $('#filter-pelapor').val();
                    },
                    error: function(xhr) {
                        console.error('DataTable AJAX error:', xhr.responseText);
                    }
                },
                columns: [{
                        data: 'nomor_tiket',
                        render: function(data) {
                            return `<span class="ticket-no">#${data}</span>`;
                        }
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'pelapor'
                    },
                    {
                        data: 'ruangan'
                    },
                    {
                        data: 'kategori'
                    },
                    {
                        data: 'keterangan',
                        render: function(data) {
                            return data ?
                                `<span title="${data}">${data.length > 40 ? data.substring(0,40)+'…' : data}</span>` :
                                '-';
                        }
                    },
                    {
                        data: 'status',
                        render: function(data) {
                            const map = {
                                'Diterima': 'badge-diterima',
                                'Diproses': 'badge-diproses',
                                'Selesai': 'badge-selesai',
                            };
                            return `<span class="badge ${map[data] || ''}">${data || '-'}</span>`;
                        }
                    },
                    {
                        data: 'dokumen_pendukung',
                        render: function(data) {
                            if (data) {
                                return `<a href="/storage/${data}" class="btn-rs-edit" download>
                                    <i class="fas fa-download" style="font-size:11px;"></i> Unduh
                                </a>`;
                            }
                            return '<span style="color:#9ca3af;font-size:12px;">-</span>';
                        }
                    },
                    {
                        data: 'waktu_diproses',
                        render: function(data) {
                            if (data === '-') return '<span style="color:#9ca3af;">-</span>';
                            return `<span style="font-size:12px;">${data}</span>`;
                        }
                    },
                    {
                        data: 'waktu_selesai_keterangan',
                        render: function(data, type, row) {
                            if (row.status === 'Selesai' && data) {
                                return `<span style="font-size:12px;">${data}</span>`;
                            }
                            return '<span style="color:#9ca3af;">-</span>';
                        }
                    },
                    {
                        data: 'deskripsi',
                        render: function(data) {
                            if (!data) return '<span style="color:#9ca3af;">-</span>';
                            return `<span title="${data}">${data.length > 40 ? data.substring(0,40)+'…' : data}</span>`;
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                        <div style="display:flex;gap:5px;align-items:center;">
                            <a href="/laporan/${row.id}/edit" class="btn-rs-edit">
                                <i class="fas fa-pen" style="font-size:10px;"></i> Edit
                            </a>

                        </div>`;
                        }
                    },
                ]
            });

            // ===================================================
            // 4. AUTO-REFRESH saat filter berubah
            //  <button class="btn-rs-del btn-delete-laporan" data-id="${row.id}">
            //                     <i class="fas fa-trash" style="font-size:10px;"></i>
            //                 </button>
            // ===================================================
            function refreshTable() {
                table.ajax.reload(null, false); // false = jangan reset halaman
            }

            // Ruangan: langsung refresh saat pilih
            $('#filter-ruangan').on('change', function() {
                refreshTable();
                updateChips();
            });

            // Pelapor: debounce 600ms supaya tidak spam request
            let debounceTimer;
            $('#filter-pelapor').on('input', function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function() {
                    refreshTable();
                    updateChips();
                }, 600);
            });

            // ===================================================
            // 5. ACTIVE FILTER CHIPS
            // ===================================================
            function updateChips() {
                const ruangan = $('#filter-ruangan option:selected').text().trim();
                const tanggal = $('#filter-tanggal').val().trim();
                const pelapor = $('#filter-pelapor').val().trim();

                const container = $('#activeChips');
                container.empty();

                let hasFilter = false;

                if ($('#filter-ruangan').val()) {
                    hasFilter = true;
                    container.append(
                        `<span class="chip"><i class="fas fa-building" style="font-size:9px;"></i> ${ruangan}</span>`
                    );
                }

                if (tanggal) {
                    hasFilter = true;
                    container.append(
                        `<span class="chip"><i class="fas fa-calendar" style="font-size:9px;"></i> ${tanggal}</span>`
                    );
                }

                if (pelapor) {
                    hasFilter = true;
                    container.append(
                        `<span class="chip"><i class="fas fa-user" style="font-size:9px;"></i> ${pelapor}</span>`
                    );
                }

                if (!hasFilter) {
                    container.append(
                        '<span id="no-filter-msg" style="font-size:12px;color:#9ca3af;">Tidak ada filter</span>'
                    );
                }
            }

            // ===================================================
            // 6. RESET FILTER
            // ===================================================
            $('#btnResetFilter').on('click', function() {
                $('#filter-ruangan').val('');
                $('#filter-tanggal').val('');
                $('#filter-pelapor').val('');
                refreshTable();
                updateChips();
            });

            // ===================================================
            // 7. DELETE dengan SweetAlert
            // ===================================================
            const deleteRoute = "{{ route('laporan.hapus', ':id') }}";

            $(document).on('click', '.btn-delete-laporan', function() {
                const id = $(this).data('id');
                const url = deleteRoute.replace(':id', id);

                Swal.fire({
                    title: 'Hapus tiket ini?',
                    text: 'Data yang dihapus tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ec4899',
                    cancelButtonColor: '#9ca3af',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    borderRadius: '14px',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonColor: '#ec4899'
                                });
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat menghapus data.',
                                    icon: 'error',
                                    confirmButtonColor: '#ec4899'
                                });
                                console.error(xhr.responseJSON);
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
