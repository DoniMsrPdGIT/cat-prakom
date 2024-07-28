<div class="row">
    <?php if($this->ion_auth->is_admin()) : ?>
    <div class="col-sm-12 mb-4">
        <a href="<?=base_url('users')?>" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Batal
        </a>
    </div>
    <div class="col-sm-4">
        <?=form_open('users/edit_info', array('id'=>'user_info'), array('id'=>$users->id))?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$users->username?>">
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="first_name">Testimoni</label>
                        <input type="text" name="first_name" class="form-control" value="<?=$users->first_name?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="last_name">Melamar</label>
                        <input type="text" name="last_name" class="form-control" value="<?=$users->last_name?>">
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?=$users->email?>">
                    <small class="help-block"></small>
                </div>
		
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-info" class="btn btn-info">Simpan</button>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <?php endif; ?>
    <?php if($user->id !== $users->id) : ?>
    <div class="col-sm-4">
        <?=form_open('users/edit_level', array('id'=>'user_level'), array('id'=>$users->id))?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Level</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="level">Level User</label>
                    <select id="level" name="level" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Level</option>
                        <?php foreach ($groups as $row) : ?>
                            <option <?=$level->id===$row->id ? "selected" : ""?> value="<?=$row->id?>"><?=$row->name?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-level" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?=form_close()?>

        <?=form_open('users/edit_status', array('id'=>'user_status'), array('id'=>$users->id))?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Status Paket Member</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    
                    <label>
                        <input <?=$users->activation_code==='0'?"checked":""?> type="radio" name="status" value="0"> Non-Aktif
                    </label>&nbsp;&nbsp;
                    <label>
                        <input <?=$users->activation_code==='1'?"checked":""?> type="radio" name="status" value="1"> Full PPPK
                    </label>&nbsp;&nbsp;
                    <label>
                        <input <?=$users->activation_code==='2'?"checked":""?> type="radio" name="status" value="2"> Fokus SKD
                    </label>&nbsp;&nbsp;
                    <label>
                        <input <?=$users->activation_code==='3'?"checked":""?> type="radio" name="status" value="3"> Full CPNS
                    </label>
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-status" class="btn btn-success">Simpan</button>
            </div>
        </div>
        <?=form_close()?>
		
		<?=form_open('users/edit_mahasiswa', array('id'=>'user_status'), array('id'=>$users->id))?>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Data Master</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                 <select type="text" class="form-control" name="jenis_waktu" placeholder="Zona Waktu" required>
                        <option>--Pilih Zona Waktu--</option>
                        <option value="1">WIB</option>
                        <option value="2">WITA</option>
                        <option value="3">WIT</option>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="btn-status" class="btn btn-success">Simpan</button>
            </div>
        </div>
        <?=form_close()?>
    </div>
    <?php endif;?>
    <?php if($user->id === $users->id) : ?>
    <div class="col-sm-4">
        <?=form_open('users/change_password', array('id'=>'change_password'), array('id'=>$users->id))?>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Password</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body pb-0">
                <div class="form-group">
                    <label for="old">Password Lama</label>
                    <input type="password" placeholder="Password Lama" name="old" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new">Password Baru</label>
                    <input type="password" placeholder="Password Baru" name="new" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new_confirm">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi Password Baru" name="new_confirm" class="form-control">
                    <small class="help-block"></small>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-flat btn-default">
                    <i class="fa fa-rotate-left"></i> Reset
                </button>
                <button type="submit" id="btn-pass" class="btn btn-flat btn-warning">Ganti Status</button>            
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script src="<?=base_url()?>assets/dist/js/app/users/edit.js"></script>

<?php if($user->id === $users->id) : ?>
<script type="text/javascript">
$(document).ready(function(){
    $('form#change_password').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        let btn = $('#btn-pass');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Password anda berhasil diganti";
        submitajax(url, data, msg, btn);
    });
});
</script>
<?php endif; ?>