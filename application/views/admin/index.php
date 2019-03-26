  <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
          </div>
				<?php endif; ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ruang</h1>
            <div class="text-right m-3">
              <a href="<?= base_url('Ruang/add/') ?>" class="btn btn-primary">Tambah Ruang <i class="fas fa-plus pl-2"></i></a>
            </div>
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-10">
                <div class="card-body">
                    <table class="table table-responsive-sm">
                  <thead>
									<tr>
                    <th>Gambar</th>
										<th>Nomor ruang</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tb_ruang as $r): ?>
									<tr>
                    <td>
											<img src="<?= base_url('asset/img/ruang/'.$r->image) ?>" width="250" />
										</td>
										<td width="150">
											<?= $r->no_ruang ?>
										</td>
										<td>
											<?= $r->status ?>
										</td>
										<td width="250">
											<a href="<?= site_url('ruang/edit/'.$r->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit
                     </a>
                       <a onclick="deleteConfirm('<?= site_url('Ruang/delete/'.$r->id) ?>')" href="#!" class="btn btn-small text-danger">
                         <i class="fas fa-trash"></i> Hapus
                       </a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
                   </table>

                 </div>
               </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <script>
          function deleteConfirm(url){
          	$('#btn-delete').attr('href', url);
          	$('#deleteModal').modal();
          }
        </script>
