                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                       <!--  <li>
                            <a href="index.php" class="waves-effect">
                                <i class="icon-accelerator"></i><span> Dashboard </span>
                            </a>
                        </li> -->

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span> Filter Data <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="javascript:void(0);">Pilih Kategori:</a></li>
                                <li><a>
                                  <select style="width: 180px" id="kategori">
                                    <?php
                                        $k=pg_query("SELECT * FROM kategori order by nama_kategori");
                                        while ($data=pg_fetch_assoc($k)) {
                                            echo "<option value=".$data['id_kategori'].">".$data['nama_kategori']."</option>";
                                        }
                                    ?>
                                  </select>
                                </a></li>
                                <li><a href="javascript:void(0);">Tahun:</a></li>
                                <li><a href="#"><input type="number" name="" id="tahun" value="2017" style="width: 100px"></a></li>                       
                                <li><a href="javascript:void(0);"><button class="btn btn-success" onclick="tampilkandata()">Search</button></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="sumbar.php" class="waves-effect"><i class="icon-mail-open"></i><span> Data Sumbar Per Tahun</span> </span></a>
                        </li>
                        <li>
                            <a href="pp.php" class="waves-effect"><i class="icon-mail-open"></i><span> Data Pertanian & Peternakan</span> </span></a>
                        </li>

                    </ul>

                </div>

    <script type="text/javascript">
function tampilkandata() {
    var kategori = document.getElementById("kategori").value;
    var tahun = document.getElementById("tahun").value;
    window.location = "db.php?kategori="+kategori+"&tahun="+tahun;
}
    </script>