@extends('layout.main')
@section('otherPage')
<style>
    .select2-container .select2-selection--single {
        height: 38px;
        padding: 6px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

</style>
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav --><!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Breadcrumb -->
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Invoice</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <!-- Container -->
        <div class="container">
            <div class="col-xl-12">
                <div class="hk-pg-header mb-10 d-flex justify-content-between">
                    <div>
                        <h4 class="hk-pg-title"></h4>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('invoices') }}"><button class="btn btn-primary">Back to Invoice List</button></a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <section class="hk-sec-wrapper">
                    @if (session('error'))
                        <p class="alert alert-danger">{{ session('error') }}</p>
                    @endif
                    <div class="d-flex justify-content-end"></div>
                    {{-- <a href="{{url('staff-register')}}"><button class="btn btn-primary">
                            New Staff Registration</button></a> --}}
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('invoice.create.data') }}" method="POST">
                                @csrf
                                <div class="invoice-box">
                                    <!-- Header -->
                                    <div class="header text-center mb-4">
                                        <h4>SAMMRIDDHI ELECTRICALS</h4>
                                        <p><b>ELECTRICAL CONTRACTOR & GENERAL ORDER SUPPLIER</b></p>
                                        <p>506 G.T ROAD MANGALDEEP APARTMENT BLOCK- A 3<sup>rd</sup> FLOOR FAZIR BAZAR
                                            HOWRAH-1</p>
                                        <p>OFFICE:- 6, MANGOE LANE KOLKATA- 711101</p>
                                    </div>

                                   <div class="row">
                                    <div class="col-sm-6">
                                         <!-- Client Details -->
                                    <div class="mb-3">
                                        <label class="form-label">Messer’s</label>
                                        <select onchange="clientInformation(this)" class="form-control select2" name="client_id" required>
                                            <option value="" disabled selected>Select Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    </div>
                                    <div class="col-sm-6">
                                            <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            placeholder="5 Q Cornfield Road Kolkata - 700019">
                                    </div>
                                    </div>
                                   </div>

                                    <!-- Table -->
                                    <table class="table table-bordered" id="productTable">
                                        <thead>
                                            <tr>

                                                <th>PARTICULARS</th>
                                                <th>Qty.</th>
                                                <th>Rate</th>
                                                <th>Rs.</th>
                                                <th>P.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    <textarea name="particulars[]" class="form-control particulars" rows="2"></textarea>
                                                </td>
                                                <td><input type="number" name="qty[]" class="form-control qty" ></td>
                                                <td><input type="number" name="rate[]" class="form-control rate"></td>
                                                <td><input type="text" class="form-control amount" readonly></td>
                                                <td><input type="text" class="form-control paise" value="00"></td>
                                                <td><button type="button"
                                                        class="btn btn-danger btn-sm removeRow">X</button></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <button type="button" class="btn btn-primary mb-3" id="addRow">+ Add
                                        Product</button>

                                    <!-- Total -->
                                    <div class="d-flex justify-content-end">
                                        <table class="table table-bordered w-50">
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td><input type="text" class="form-control" id="totalRs" readonly></td>
                                                <td><input type="text" class="form-control" value="00" readonly></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Rupees in Words -->
                                    <p><b>Rupees -</b> <input type="text" class="form-control d-inline w-50"
                                            id="totalInWords" readonly></p>

                                    <!-- Footer -->
                                    <div class="d-flex justify-content-between mt-5">
                                        <div>
                                            <p>
                                              Date <input type="date" name="bill_date" class="form-control d-inline w-auto"
                                                        value="{{ date('Y-m-d') }}">

                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <p>For <b>SAMMRIDDHI ELECTRICALS</b></p>
                                            <button type="submit" class="btn btn-primary mt-3">Create Invoice</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- /Container -->
    </div>


    <script>
        function numberToWords(num) {
            const a = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
                'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen',
                'Eighteen', 'Nineteen'
            ];
            const b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

            function inWords(n) {
                if (n < 20) return a[n];
                if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? " " + a[n % 10] : "");
                if (n < 1000) return a[Math.floor(n / 100)] + " Hundred " + (n % 100 == 0 ? "" : inWords(n % 100));
                if (n < 100000) return inWords(Math.floor(n / 1000)) + " Thousand " + (n % 1000 == 0 ? "" : inWords(n %
                    1000));
                if (n < 10000000) return inWords(Math.floor(n / 100000)) + " Lakh " + (n % 100000 == 0 ? "" : inWords(n %
                    100000));
                return inWords(Math.floor(n / 10000000)) + " Crore " + (n % 10000000 == 0 ? "" : inWords(n % 10000000));
            }
            return inWords(num).trim() + " only";
        }

        function updateTotals() {
            let total = 0;
            document.querySelectorAll("#productTable tbody tr").forEach(row => {
                let qty = parseFloat(row.querySelector(".qty").value) || 0;
                let rate = parseFloat(row.querySelector(".rate").value) || 0;
                let amount = qty * rate;
                row.querySelector(".amount").value = amount ? amount.toFixed(2) : "";
                total += amount;
            });

            document.getElementById("totalRs").value = total.toFixed(2);
            document.getElementById("totalInWords").value = numberToWords(Math.round(total));
        }

        // Add row
        document.getElementById("addRow").addEventListener("click", () => {
            let table = document.querySelector("#productTable tbody");
            let rowCount = table.rows.length + 1;
            let newRow = document.createElement("tr");
            newRow.innerHTML = `

    <td><textarea class="form-control particulars" name="particulars[]" rows="2"></textarea></td>
    <td><input type="number" class="form-control qty" name="qty[]" value="1"></td>
    <td><input type="number" class="form-control rate" name="rate[]"></td>
    <td><input type="text" class="form-control amount" readonly></td>
    <td><input type="text" class="form-control paise" value="00"></td>
    <td><button type="button" class="btn btn-danger btn-sm removeRow">X</button></td>
  `;
            table.appendChild(newRow);
        });

        // Remove row
        document.addEventListener("click", e => {
            if (e.target.classList.contains("removeRow")) {
                e.target.closest("tr").remove();
                updateTotals();
            }
        });

        // Update totals on input
        document.addEventListener("input", e => {
            if (e.target.classList.contains("qty") || e.target.classList.contains("rate")) {
                updateTotals();
            }
        });

        // Initial calc
        updateTotals();

        function clientInformation(select) {
            const clientId = select.value;
            const clients = @json($clients);
            const client = clients.find(c => c.id == clientId);
            if (client) {
                document.getElementById('address').value = client.address || '';
            } else {
                document.getElementById('address').value = '';
            }
        }
    </script>
@stop
