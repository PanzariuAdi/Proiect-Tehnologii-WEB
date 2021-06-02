<?php 
    class Admin extends Controller {
        public function __construct() { }

        public function index() {
            $this->view('admin/admin');
        }

        public function add_event() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                ?>
                
                 <script>
                    var eventid = <?php if(isset($_POST['id'])) { echo $_POST['id']; } else { echo 1; } ?>;
                    var iyear = <?php if(isset($_POST['year'])) { echo $_POST['year']; } else { echo 0; } ?>;
                    var imonth = <?php if(isset($_POST['month'])) { echo $_POST['month']; } else { echo 0; } ?>;
                    var day = <?php if(isset($_POST['day'])) { echo $_POST['day']; } else { echo 0; } ?>;
                    var extented = <?php if(isset($_POST['extended'])) { echo $_POST['extended']; } else { echo 0; } ?>;
                    var country = "<?php echo $_POST['country']; ?>";
                    var region = "<?php echo $_POST['region']; ?>";
                    var state = "<?php echo $_POST['state']; ?>";
                    var city = "<?php echo $_POST['city']; ?>";
                    var latitude = <?php if(isset($_POST['latitude'])) { echo $_POST['latitude']; } else { echo 0; }?>;
                    var longitude = <?php if(isset($_POST['longitude'])) { echo $_POST['longitude']; } else { echo 0; }?>;
                    var specificity = <?php if(isset($_POST['specificity'])) { echo $_POST['specificity']; } else { echo 0; }?>;
                    var vicinity = <?php if(isset($_POST['vicinity'])) { echo $_POST['vicinity']; } else { echo 0; }?>;
                    var summary = "<?php echo $_POST['summary']; ?>";
                    var multiple = <?php if(isset($_POST['multiple'])) { echo $_POST['multiple']; } else { echo 0; }?>;
                    var succes = <?php if(isset($_POST['succes'])) { echo $_POST['succes']; } else { echo 0; }?>;
                    var suicide = <?php if(isset($_POST['suicide'])) { echo $_POST['suicide']; } else { echo 0; }?>;
                    var attacktype = "<?php echo $_POST['attacktype']; ?>";
                    var targtype = "<?php echo $_POST['targtype']; ?>";
                    var corp = "<?php echo $_POST['corp']; ?>";
                    var target = "<?php echo $_POST['target']; ?>";
                    var nationality = "<?php echo $_POST['nationality']; ?>";
                    var gname = "<?php echo $_POST['gname']; ?>";
                    var motive = "<?php echo $_POST['motive']; ?>";
                    var claimed = "<?php echo $_POST['claimed']; ?>";
                    var wptype = "<?php echo $_POST['wptype']; ?>";
                    var wpdetail = "<?php echo $_POST['wpdetail']; ?>";
                    var nkill = <?php if(isset($_POST['nkill'])) { echo $_POST['nkill']; } else { echo 0; } ?>;
                    var nkillus = "<?php echo $_POST['nkillus']; ?>";
                    var nkillter = "<?php echo $_POST['nkillter']; ?>";
                    var nwounds = <?php if(isset($_POST['nwounds'])) { echo $_POST['nwounds']; } else { echo 0; } ?>;
                    var ishostkid = <?php if(isset($_POST['ishostkid'])) { echo $_POST['ishostkid']; } else { echo 0; } ?>;
                    var addnotes = "<?php echo $_POST['notes']; ?>";
                    var propextent = "<?php echo $_POST['propextent']; ?>";
                
                    addAttack = async (id, year, month, day, ex, country, region, state, city, lat, lot, spec, vic, summ, multiple, succ, suicide, attack, targ, corp, target, nat, 
                    gname, motive, claimed, wptype, wpdetail, nkill, nkillus, nkillter, nwounds, ishostkid, addnotes, propextent) => 
                    {
                        try {
                            var query = `
                                mutation {
                                    addAttack (
                                        eventid: ${id}
                                        iyear: ${year}
                                        imonth: ${month}
                                        iday: ${day}    
                                        extended: ${ex}
                                        country_txt: "${country}"
                                        region_txt: "${region}"
                                        provstate: "${state}"
                                        city: "${city}"
                                        latitude: ${lat}
                                        longitude: ${lot}
                                        specificity: ${spec}
                                        vicinity: ${vic}
                                        summary: "${summ}"
                                        multiple: ${multiple}
                                        success: ${succ}
                                        suicide: ${suicide} 
                                        attacktype1_txt: "${attack}"
                                        targtype1_txt: "${targ}"
                                        corp: "${corp}"
                                        target: "${target}"
                                        natlty1_txt: "${nat}"
                                        gname: "${gname}"
                                        motive: "${motive}"
                                        claimed: "${claimed}"
                                        weaptype1_txt: "${wptype}"
                                        weapdetail: "${wpdetail}"
                                        nkill: ${nkill}
                                        nkillus: "${nkillus}"
                                        nkillter: "${nkillter}"
                                        nwounds: ${nwounds}
                                        ishostkid: ${ishostkid}
                                        addnotes: "${addnotes}"
                                        propextent_txt: "${propextent}" 
                                    )
                                }
                            `;

                            await fetch('http://localhost:4000/', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({query})
                            })
                        } catch(err) {
                            console.log(err);
                        }
                    }

                    addAttack(eventid, iyear, imonth, day, extented, country, region, state, city, latitude, longitude, specificity, vicinity, summary, multiple, 
                    succes, suicide, attacktype, targtype, corp, target, nationality, gname, motive, claimed, wptype, wpdetail, nkill, nkillus, nkillter, nwounds, 
                    ishostkid, addnotes, propextent);
                </script>
                <?php
            }
            $this->view('admin/admin_add');
        }

        public function delete_event() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                ?>
                <script>
                var id = <?php echo $_POST['attackid']; ?>;

                deleteAttack = async (id) => {
                        try {
                            var query = `
                                mutation {
                                    deleteAttack (eventid: ${id})
                                }`;

                                fetch('http://localhost:4000/', {
                                    method: 'POST',
                                    headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({query})
                                })
                        } catch(err) {
                            console.log(err);
                        }
                }
                deleteAttack(id);
                </script>
                <?php
            }
            $this->view('admin/admin_delete');
        }

        public function update_event() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                ?>
                <script>
                    var eventid = <?php if(isset($_POST['id'])) { echo $_POST['id']; } else { echo 1; } ?>;
                    var iyear = <?php if(isset($_POST['year'])) { echo $_POST['year']; } else { echo 0; } ?>;
                    var imonth = <?php if(isset($_POST['month'])) { echo $_POST['month']; } else { echo 0; } ?>;
                    var day = <?php if(isset($_POST['day'])) { echo $_POST['day']; } else { echo 0; } ?>;
                    var extented = <?php if(isset($_POST['extended'])) { echo $_POST['extended']; } else { echo 0; } ?>;
                    var country = "<?php echo $_POST['country']; ?>";
                    var region = "<?php echo $_POST['region']; ?>";
                    var state = "<?php echo $_POST['state']; ?>";
                    var city = "<?php echo $_POST['city']; ?>";
                    var latitude = <?php if(isset($_POST['latitude'])) { echo $_POST['latitude']; } else { echo 0; }?>;
                    var longitude = <?php if(isset($_POST['longitude'])) { echo $_POST['longitude']; } else { echo 0; }?>;
                    var specificity = <?php if(isset($_POST['specificity'])) { echo $_POST['specificity']; } else { echo 0; }?>;
                    var vicinity = <?php if(isset($_POST['vicinity'])) { echo $_POST['vicinity']; } else { echo 0; }?>;
                    var summary = "<?php echo $_POST['summary']; ?>";
                    var multiple = <?php if(isset($_POST['multiple'])) { echo $_POST['multiple']; } else { echo 0; }?>;
                    var succes = <?php if(isset($_POST['succes'])) { echo $_POST['succes']; } else { echo 0; }?>;
                    var suicide = <?php if(isset($_POST['suicide'])) { echo $_POST['suicide']; } else { echo 0; }?>;
                    var attacktype = "<?php echo $_POST['attacktype']; ?>";
                    var targtype = "<?php echo $_POST['targtype']; ?>";
                    var corp = "<?php echo $_POST['corp']; ?>";
                    var target = "<?php echo $_POST['target']; ?>";
                    var nationality = "<?php echo $_POST['nationality']; ?>";
                    var gname = "<?php echo $_POST['gname']; ?>";
                    var motive = "<?php echo $_POST['motive']; ?>";
                    var claimed = "<?php echo $_POST['claimed']; ?>";
                    var wptype = "<?php echo $_POST['wptype']; ?>";
                    var wpdetail = "<?php echo $_POST['wpdetail']; ?>";
                    var nkill = <?php if(isset($_POST['nkill'])) { echo $_POST['nkill']; } else { echo 0; } ?>;
                    var nkillus = "<?php echo $_POST['nkillus']; ?>";
                    var nkillter = "<?php echo $_POST['nkillter']; ?>";
                    var nwounds = <?php if(isset($_POST['nwounds'])) { echo $_POST['nwounds']; } else { echo 0; } ?>;
                    var ishostkid = <?php if(isset($_POST['ishostkid'])) { echo $_POST['ishostkid']; } else { echo 0; } ?>;
                    var addnotes = "<?php echo $_POST['notes']; ?>";
                    var propextent = "<?php echo $_POST['propextent']; ?>";
                
                    updateAttack = async (id, year, month, day, ex, country, region, state, city, lat, lot, spec, vic, summ, multiple, succ, suicide, attack, targ, corp, target, nat, 
                    gname, motive, claimed, wptype, wpdetail, nkill, nkillus, nkillter, nwounds, ishostkid, addnotes, propextent) => 
                    {
                        try {
                            var query = `
                                mutation {
                                    updateAttack (
                                        eventid: ${id}
                                        iyear: ${year}
                                        imonth: ${month}
                                        iday: ${day}    
                                        extended: ${ex}
                                        country_txt: "${country}"
                                        region_txt: "${region}"
                                        provstate: "${state}"
                                        city: "${city}"
                                        latitude: ${lat}
                                        longitude: ${lot}
                                        specificity: ${spec}
                                        vicinity: ${vic}
                                        summary: "${summ}"
                                        multiple: ${multiple}
                                        success: ${succ}
                                        suicide: ${suicide} 
                                        attacktype1_txt: "${attack}"
                                        targtype1_txt: "${targ}"
                                        corp: "${corp}"
                                        target: "${target}"
                                        natlty1_txt: "${nat}"
                                        gname: "${gname}"
                                        motive: "${motive}"
                                        claimed: "${claimed}"
                                        weaptype1_txt: "${wptype}"
                                        weapdetail: "${wpdetail}"
                                        nkill: ${nkill}
                                        nkillus: "${nkillus}"
                                        nkillter: "${nkillter}"
                                        nwounds: ${nwounds}
                                        ishostkid: ${ishostkid}
                                        addnotes: "${addnotes}"
                                        propextent_txt: "${propextent}" 
                                    )
                                }
                            `;

                            await fetch('http://localhost:4000/', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({query})
                            })
                        } catch(err) {
                            console.log(err);
                        }
                    }

                    updateAttack(eventid, iyear, imonth, day, extented, country, region, state, city, latitude, longitude, specificity, vicinity, summary, multiple, 
                    succes, suicide, attacktype, targtype, corp, target, nationality, gname, motive, claimed, wptype, wpdetail, nkill, nkillus, nkillter, nwounds, 
                    ishostkid, addnotes, propextent);
                </script>
                <?php
            }
            $this->view('admin/admin_update');
        }

        public function add_article() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                ?>
                <script>
                var title = "<?php echo $_POST['title_article']; ?>";
                var description = "<?php echo $_POST['description']; ?>";
                

                addArticle = async (title, description) => {
                    try {   
                        var query = 
                            `mutation {
                                addArticle (
                                    title: "${title}",
                                    date: "2020-10-10", 
                                    description: "${description}")
                            }`;

                        await fetch('http://localhost:4000/', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({query})
                        })
                    } catch(err) {
                        console.log(err);
                    }
                }

                addArticle(title, description);
                </script>

                <?php
            }
            $this->view('admin/admin_add_article');
        }   

        public function update_article() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                ?>

                <script>
                    var id = "<?php echo $_POST['article_id']; ?>";
                    var title = "<?php echo $_POST['article_title']; ?>";
                    var description = "<?php echo $_POST['article_description']; ?>";

                    updateArticle = async (id, title, description) => {
                        try {
                            var query = `
                                mutation {
                                    updateArticle (
                                        id: ${id}, 
                                        title: "${title}",
                                        date: "2021-10-10",
                                        description: "${description}")
                                }`;

                                fetch('http://localhost:4000/', {
                                    method: 'POST',
                                    headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({query})
                                })
                        } catch(err) {
                            console.log(err);
                        }
                    }
                    updateArticle(id, title, description);
                </script>

                <?php
            }

            $this->view('admin/admin_update_article');
        }

        public function delete_article() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            }
            ?>
            <script>
                var id = <?php echo $_POST['article_id']; ?>;
                deleteArticle = async (id) => {
                        try {
                            var query = `
                                mutation {
                                    deleteArticle (id: ${id})
                                }`;

                                fetch('http://localhost:4000/', {
                                    method: 'POST',
                                    headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({query})
                                })
                        } catch(err) {
                            console.log(err);
                        }
                }

                deleteArticle(id);
            </script>

            <?php
            $this->view('admin/admin_delete_article');
        }

        public function manage() {
            $this->view('admin/admin_manage');
        }

        public function myaccount() {
            $this->view('admin/admin_myaccount');
        }

        public function see_articles() {
            $this->view('admin/admin_see_articles');
        }

        public function articles_redirect() {
            $this->view('admin/admin_articles_redirect');
        }

        public function attacks_redirect() {
            $this->view('admin/admin_attacks_redirect');
        }

        public function see_events() {
            $this->view('admin/admin_events');
        }
      }
?>