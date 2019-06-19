<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">liste tache</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>tache
                    <!-- <div class="pull-right"> -->

                    <div class="form-group">
                        <label>projet</label>
                        <select class="form-control" id="projet" name="projet" onclick="getTache()">
                            <?php foreach ($projet as $data) { ?>
                                <option value="<?php echo $data->IDPROJET ?>"><?php echo $data->NOMPROJET; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                        function getTache() {
                            var select = document.getElementById("projet");
                            console.log("ijer tache");
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    var sc = JSON.parse(this.responseText);
                                    setdetail(sc);
                                }
                            };
                            xmlhttp.open("GET", "<?php echo site_url('Taches/getTache/') ?>" + select.value, true);
                            xmlhttp.send();
                        }

                        function setdetail(array) {
                            var sc = document.getElementById("tache");
                            sc.innerHTML = "";
                            var list = document.createElement('ul');
                            for (var i = 0; i < array.length; i++) {

                                var item = document.createElement('li');
                                item.appendChild(document.createTextNode(array[i].NOMTACHE));
                                list.appendChild(item);

                                var a = document.createElement('a');
                                var linkText = document.createTextNode("modifier");
                                a.appendChild(linkText);
                                a.title = "modifier ";
                                a.href = "<?php echo base_url('Taches/modify/')?>" + array[i].idtache;

                                var a2 = document.createElement('a');
                                var linkText = document.createTextNode("supprimer ");
                                a2.appendChild(linkText);
                                a2.title = "supprimer";
                                a2.href = "<?php echo base_url('Taches/delete/')?>" + array[i].idtache;

                                sc.appendChild(list);
                                sc.appendChild(a);
                                sc.appendChild(a2);
                            }
                        }
                    </script>
                    <div id="tache">
                    </div>

                    <!-- </div> -->
                </div>

            </div>

        </div>

    </div>
    <!-- /.row -->
</div>