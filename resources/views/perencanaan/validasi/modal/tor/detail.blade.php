<div class="modal fade" tabindex="-1" role="dialog" id="detail_tor{{$join[$a]->tor_id}}">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffc107;color:white">
                <h5 class="modal-title" style="color:white"><b>Status Pengajuan TOR</b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header bg-transparent pb-0">
                        <div>
                            <!-- <h3 class="card-title mb-2">Status Pengajuan TOR</h3> -->
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        <div class="latest-timeline mt-4">
                            <ul class="timeline mb-0">
                                <?php
                                $indexwarna = 0;
                                $ada = 0;
                                if (!empty($trx_status_tor)) {
                                    for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                        if ($trx_status_tor[$q3]->id_tor == $join[$a]->tor_id) {
                                ?>
                                            <li>
                                                <?php for ($st = 0; $st < count($status); $st++) {
                                                    if ($status[$st]->id == $trx_status_tor[$q3]->id_status) {
                                                        $wstatus = $status[$st]->nama_status;
                                                        if ($wstatus == 'Proses Pengajuan') {
                                                            $warnaLingkar = 'featured_icon';
                                                        } elseif ($wstatus == 'Verifikasi') {
                                                            $warnaLingkar = 'featured_icon border-warning';
                                                        } elseif ($wstatus == 'Review') {
                                                            $warnaLingkar = 'featured_icon  border-info';
                                                        } elseif ($wstatus == 'Revisi') {
                                                            $warnaLingkar = 'featured_icon  border-danger';
                                                        } elseif ($wstatus == 'Validasi') {
                                                            $warnaLingkar = 'featured_icon  border-success';
                                                        } elseif ($wstatus == 'Pengajuan Perbaikan') {
                                                            $warnaLingkar = 'featured_icon';
                                                        }
                                                    }
                                                }
                                                ?>
                                            <li>
                                                <div class="{{$warnaLingkar}}"></div>
                                            </li>
                                            <div><span class="tx-11 text-muted float-end">{{$trx_status_tor[$q3]->created_at}}</span></div>

                                            <?php
                                            $indexwarna += 1;
                                            if ($indexwarna > 3) {
                                                $indexwarna = 0;
                                            }
                                            ?>

                                            <li class="mt-0 activity">
                                                <?php
                                                for ($st3 = 0; $st3 < count($status); $st3++) {
                                                    if ($status[$st3]->id == $trx_status_tor[$q3]->id_status) { ?>
                                                        <a href="javascript:void(0);" class="tx-12 text-dark">
                                                            <p class="mb-1 font-weight-semibold text-dark tx-13">
                                                                <?php echo "<b>" . "" . "</b>" . $status[$st3]->nama_status; ?>
                                                            </p>
                                                        </a>
                                                        <?php for ($u = 0; $u < count($user); $u++) {
                                                            if ($user[$u]->id == $trx_status_tor[$q3]->create_by) {
                                                                for ($rl = 0; $rl < count($role); $rl++) {
                                                                    if ($role[$rl]->id == $user[$u]->role) {
                                                                        // $pengvalidasi = $role[$rl]->id;
                                                        ?>
                                                                        <p class="text-muted mt-0 mb-0 tx-12">
                                                                            <?php echo "Create by : " .  $user[$u]->name . " - " . $trx_status_tor[$q3]->role_by; ?>
                                                                        </p>
                                                <?php }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                <div class="col">
                                                    <!-- <small style="font-size: smaller;color:grey" class="float-right mt-1">{{$trx_status_tor[$q3]->created_at}}</small> -->
                                                </div>
                                            </li>

                                <?php }
                                    }
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>