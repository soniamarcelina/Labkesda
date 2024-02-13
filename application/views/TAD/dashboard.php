<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-2 col-md-6 mb-4">
        <a href="#" onclick="showOR()" class="badge element">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">

                    <div class="col-xl-12 mr-2 mb-2">
                        <i class="fas fa-bezier-curve fa-2x text-gray-300"></i>
                    </div>
                    <div class="col-xl-12 mr-2 mt-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Create OR </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-xl-2 col-md-6 mb-4">
        <a href="<?php echo base_url()?>TAD/MRF/create" class="badge element">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center text-center">

                    <div class="col-xl-12 mr-2 mb-2">
                        <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                    <div class="col-xl-12 mr-2 mt-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Create MRF </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Personnel Candidate</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Active Personnel (Assignment)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Employee
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $emp_count ?></div>
                                </div>
                                <div class="col">
                                    <!-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kontrak PJP</div>
                            <div class="h5 mb-0 font-weight-bold text-danger"><?php echo $contr_count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Headcount per Function</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myHeadcount" width="400" height="200"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Headcount per Function</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-2">
                            </div>
                            <div class="table-responsive px-2">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-bordered table-sm nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fungsi</th>
                                            <th class="text-center">Jumlah Formasi Organisasi</th>
                                            <th class="text-center">Jumlah PWTT dan PWT</th>
                                            <th class="text-center">Jumlah TAD</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>TOTAL Regional</th>
                                        <th class="text-center">476</th>
                                        <th class="text-center">409</th>
                                        <th class="text-center">92</th>
                                    </tr>
                                    <tr>
                                        <th>TOTAL Zona</th>
                                        <th class="text-center">1245</th>
                                        <th class="text-center">1039</th>
                                        <th class="text-center">968</th>
                                    </tr>
                                </tfoot>
                                    <tbody>
                                    <tr>
                                    <td Class="Teks-Left">Executive</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">2</td>
                                    <td class="text-center">2</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Strategic Planning</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">16</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Production & Operation</td>
                                    <td class="text-center">51</td>
                                    <td class="text-center">40</td>
                                    <td class="text-center">13</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Development & Drilling</td>
                                    <td class="text-center">46</td>
                                    <td class="text-center">41</td>
                                    <td class="text-center">2</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Exploration</td>
                                    <td class="text-center">41</td>
                                    <td class="text-center">37</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Commercial</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">15</td>
                                    <td class="text-center">3</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Human Capital</td>
                                    <td class="text-center">36</td>
                                    <td class="text-center">32</td>
                                    <td class="text-center">9</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Information Technology</td>
                                    <td class="text-center">42</td>
                                    <td class="text-center">33</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Supply Chain Management</td>
                                    <td class="text-center">41</td>
                                    <td class="text-center">36</td>
                                    <td class="text-center">11</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">HSSE</td>
                                    <td class="text-center">29</td>
                                    <td class="text-center">27</td>
                                    <td class="text-center">9</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Finance</td>
                                    <td class="text-center">78</td>
                                    <td class="text-center">68</td>
                                    <td class="text-center">18</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Internal Audit</td>
                                    <td class="text-center">13</td>
                                    <td class="text-center">10</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Legal Counsel</td>
                                    <td class="text-center">31</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">1</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Relation</td>
                                    <td class="text-center">29</td>
                                    <td class="text-center">27</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Zona 11</td>
                                    <td class="text-center">587</td>
                                    <td class="text-center">474</td>
                                    <td class="text-center">655</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Zona 12</td>
                                    <td class="text-center">342</td>
                                    <td class="text-center">297</td>
                                    <td class="text-center">84</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Zona 13</td>
                                    <td class="text-center">211</td>
                                    <td class="text-center">181</td>
                                    <td class="text-center">55</td>
                                </tr>
                                <tr>
                                    <td Class="Teks-Left">Zona 14</td>
                                    <td class="text-center">105</td>
                                    <td class="text-center">87</td>
                                    <td class="text-center">174</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
            </div>
            </div>
        </div>

        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contract 2023</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-2">
                            </div>
                            <div class="table-responsive px-2">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-bordered table-sm nowrap" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th class="text-center">Nama Kontraktor</th>
                                        <th class="text-center">No. Kontrak</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">End Date</th>
                                        <th class="text-center">Lama Kontrak</th>
                                        <th class="text-center">Jumlah Formasi Kontrak</th>
                                        <th class="text-center">Jumlah Tenaga Alih Daya </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th class="text-center">19</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center">1380</th>
                                        <th class="text-center">1045</th>
                                    </tr>
                                </tfoot>
                                    <tbody>
                                    <tr>
                                    <td class="text-left">PT. Gearindo Prakarsa</td>
                                    <td class="text-center">4710007395</td>
                                    <td class="text-center">01 April 2023</td>
                                    <td class="text-center">30 Maret 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">40</td>
                                    <td class="text-center">45</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Gearindo Prakarsa</td>
                                    <td class="text-center">4710007393</td>
                                    <td class="text-center">01 April 2023</td>
                                    <td class="text-center">30 Maret 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">35</td>
                                    <td class="text-center">30</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Inconis Nusa Jaya</td>
                                    <td class="text-center">4710004016</td>
                                    <td class="text-center">01 April 2021</td>
                                    <td class="text-center">31 Maret 2023</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">106</td>
                                    <td class="text-center">17</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Inconis Nusa Jaya</td>
                                    <td class="text-center">4710004016</td>
                                    <td class="text-center">01 April 2021</td>
                                    <td class="text-center">31 Maret 2023</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">40</td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Gearindo Prakasa</td>
                                    <td class="text-center">4650017257</td>
                                    <td class="text-center">01 May 2023</td>
                                    <td class="text-center">30 April 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">38</td>
                                    <td class="text-center">21</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Green Planet Indonesia</td>
                                    <td class="text-center">4710007849</td>
                                    <td class="text-center">06 November 2023</td>
                                    <td class="text-center">05 November 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">99</td>
                                    <td class="text-center">66</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Rezeki Surya Intimakmur</td>
                                    <td class="text-center">4650016464</td>
                                    <td class="text-center">20 Agustus 2022</td>
                                    <td class="text-center">19 Sgustus 2024</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">146</td>
                                    <td class="text-center">141</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Ramai Jaya Abadi</td>
                                    <td class="text-center">4650017285</td>
                                    <td class="text-center">01 Juli 2023</td>
                                    <td class="text-center">30 Juni 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">226</td>
                                    <td class="text-center">175</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Bias Drillindo Utama</td>
                                    <td class="text-center">4650017278</td>
                                    <td class="text-center">01 May 2023</td>
                                    <td class="text-center">30 April 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">134</td>
                                    <td class="text-center">104</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Inter Teknis Surya Terang</td>
                                    <td class="text-center">4650016688</td>
                                    <td class="text-center">20 Oktober 2022</td>
                                    <td class="text-center">19 Oktober 2024</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">102</td>
                                    <td class="text-center">77</td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Sertco Quality</td>
                                    <td class="text-center">4710000214</td>
                                    <td class="text-center">01 September 2023</td>
                                    <td class="text-center">01 September 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">88</td>
                                    <td class="text-center">36</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Pertamina Maintenance Contruction</td>
                                    <td class="text-center">4650000244</td>
                                    <td class="text-center">01 May 2023</td>
                                    <td class="text-center">30 April 2024</td>
                                    <td class="text-center">12 Bulan</td>
                                    <td class="text-center">37</td>
                                    <td class="text-center">55</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Pertamina Maintenance Contruction</td>
                                    <td class="text-center">4650000243</td>
                                    <td class="text-center">01 May 2023</td>
                                    <td class="text-center">30 April 2024</td>
                                    <td class="text-center">12 Bulan</td>
                                    <td class="text-center">49</td>
                                    <td class="text-center">29</td>
                                </tr>
                                 <tr>
                                    <td class="text-left">PT. Banggai Sentral Sulawesi</td>
                                    <td class="text-center">3900539720</td>
                                    <td class="text-center">01 Desember 2023</td>
                                    <td class="text-center">30 November 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">52</td>
                                    <td class="text-center">44</td>
                                </tr>
                                 <tr>
                                    <td class="text-left">PT. Cakra Satya Internusa</td>
                                    <td class="text-center">3900533150</td>
                                    <td class="text-center">01 April 2023</td>
                                    <td class="text-center">30 Maret 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">35</td>
                                    <td class="text-center">11</td>
                                </tr>
                                 <tr>
                                    <td class="text-left">PT. Prima Alfa</td>
                                    <td class="text-center">4710000299</td>
                                    <td class="text-center">01 May 2023</td>
                                    <td class="text-center">30 April 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">32</td>
                                    <td class="text-center">28</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Braga Indah</td>
                                    <td class="text-center">4710000300</td>
                                    <td class="text-center">15 Oktober 2023</td>
                                    <td class="text-center">14 Oktober 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">13</td>
                                    <td class="text-center">12</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Braga Indah</td>
                                    <td class="text-center">4710000298</td>
                                    <td class="text-center">15 Oktober 2023</td>
                                    <td class="text-center">14 Oktober 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">69</td>
                                    <td class="text-center">56</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Braga Indah</td>
                                    <td class="text-center">4710000302</td>
                                    <td class="text-center">15 Oktober 2023</td>
                                    <td class="text-center">14 Oktober 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">57</td>
                                    <td class="text-center">44</td>
                                </tr>
                                <tr>
                                    <td class="text-left">PT. Braga Indah</td>
                                    <td class="text-center">4710000301</td>
                                    <td class="text-center">15 Oktober 2023</td>
                                    <td class="text-center">14 Oktober 2025</td>
                                    <td class="text-center">24 Bulan</td>
                                    <td class="text-center">22</td>
                                    <td class="text-center">22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            </div>
        </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
    <p class="mb-4"></p>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-lg-6">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Education Background</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filled Position</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>


        <!-- Donut Chart -->
        
         <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Team</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <a class="dropdown-item align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Emily Fowler</div>
                                <div class="small text-gray-500">Assoc. Analyst HCBP - Contract Until 31 Feb 2023</div>
                            </div>
                        </a>
                        <a class="dropdown-item align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate font-weight-bold">Jae Chun</div>
                                <div class="small text-gray-500">Assoc Analyst TPM - Contract Until 1 Dec 2023</div>
                            </div>
                        </a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showOR(){
                     Swal.fire({
                       title: 'Konfimasi Pembuatan OR',
                       text: 'Apakah akan menambah posisi baru atau mengganti atribut?',
                       icon: 'warning',
                       html:  '<div class="container-fluid">'+
                       '<p>Apakah akan menambah posisi baru atau mengganti atribut?</p>'+
                       '<div class="row justify-content-md-right">'+
                        '<div class="col-xl-6 col-md-6 mb-6">'+
                            `<a href="<?php echo base_url()?>TAD/orgChange/create" class="badge element">`+
                            '<div class="card shadow h-100 py-2">'+
                                '<div class="card-body">'+
                                    '<div class="row no-gutters align-items-center text-center">'+
                                        '<div class="col-xl-12 mr-2 mb-2">'+
                                            '<i class="fas fa-folder-plus fa-2x text-gray-300"></i>'+
                                        '</div>'+
                                        '<div class="col-xl-12 mr-2 mt-2">'+
                                            '<div class="h5 mb-0 font-weight-bold text-gray-800">New Position</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '</a>'+
                        '</div>'+
                        '<div class="col-xl-6 col-md-6 mb-6">'+
                            `<a href="<?php echo base_url()?>TAD/orgChange/change" class="badge element">`+
                            '<div class="card shadow h-100 py-2">'+
                                '<div class="card-body">'+
                                    '<div class="row no-gutters align-items-center text-center">'+
                                        '<div class="col-xl-12 mr-2 mb-2">'+
                                            '<i class="fas fa-pen fa-2x text-gray-300"></i>'+
                                        '</div>'+
                                        '<div class="col-xl-12 mr-2 mt-2">'+
                                            '<div class="h5 mb-0 font-weight-bold text-gray-800">Change Atribut</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '</a>'+
                        '</div>'+
                        '</div>'+
                        '</div',

                       width : 700,
                     })
    }
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {

      var gradetable = $('#dataTable').DataTable({
        scrollX:true,
        ordering : true,
        autoWidth : true,
        fixedColumns: {
            left: 2,
        },
        select: {
              style: 'single' // Enable multi-row selection (can also use 'single')
        },
        buttons: [ 
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Column visibility control'
            },
            'excel',
        ],
        dom: 'Bfrtip',
    });
     // Inisialisasi fitur drag and drop pada baris tabel
    
    });
     
    
</script>   -->

<script type="text/javascript">
    $(document).ready(function() {

      var gradetable = $('#dataTable2').DataTable({
        scrollX:true,
        ordering : true,
        autoWidth : true,
        fixedColumns: {
            left: 2,
        },
        select: {
              style: 'single' // Enable multi-row selection (can also use 'single')
        },
        buttons: [ 
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Column visibility control'
            },
            'excel',
        ],
        dom: 'Bfrtip',
    });
     // Inisialisasi fitur drag and drop pada baris tabel
    
    });
     
    
</script> 

<script>
            // Mendapatkan elemen card
            var card = document.querySelector('.card');

            // Mendapatkan elemen canvas
            var canvas = document.getElementById('myHeadcount');

            // Menyesuaikan ukuran canvas dengan ukuran card
            canvas.width = card.offsetWidth;
            canvas.height = card.offsetHeight;
        var ctx = canvas.getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Executive", "Strategic Planning", "Production & Operation", "Development & Drilling", "Exploration", "Commercial", "Human Capital", "Information Technology", "Supply Chain Management", "HSSE", "Fiannce", "Internal Audit", "Legal Counsel", "Relation", "Zona 11", "Zona 12", "Zona 13", "Zona 14"],
                datasets: [{
                    label: 'TAD',
                    data: [2, 1, 13, 2, 7, 3, 9, 7, 11, 9, 18, 1, 1,8, 649, 84, 50, 170],
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Jumlah Formasi Organisasi',
                    data: [3, 18, 51, 46, 41, 18, 36, 42, 41, 29, 78, 13, 31, 29, 587, 342, 211, 105],
                    backgroundColor: 'rgba(255, 255, 51, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'PWTT dan PWT',
                    data: [2, 16, 40, 41, 37, 15, 32, 33, 36, 27, 68, 10, 25, 27, 474, 297, 181, 87],
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url()?>assets/js/demo/chart-area-demo.js"></script>
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    var empEducation = JSON.parse('<?= json_encode($empEducation)?>');
    const arrayEdu = [];
    const arrayEduVal = [];
    const arrayColor = [];
    const arrayColorHov = [];
    empEducation.forEach(row => {
        arrayEdu.push(row.Edu)
        arrayEduVal.push(row.total)
        color = Math.floor(Math.random() * 16777215).toString(16);
        colorHov = Math.floor(Math.random() * 16777215).toString(16);
        const randomColor = "#" + color
        arrayColor.push(randomColor)
        arrayColorHov.push("#4e73e0")
    })
    console.log(arrayColor)
    console.log(arrayColorHov)
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: arrayEdu,
        datasets: [{
          data: arrayEduVal,
          backgroundColor: arrayColor,
          hoverBackgroundColor: arrayColorHov,
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: true
        },
        cutoutPercentage: 20,
      },
    });

</script>
<script src="<?php echo base_url()?>assets/js/demo/chart-bar-demo.js"></script>