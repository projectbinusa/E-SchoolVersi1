<aside class="left-sidebar">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <?php
          if (explode("/", uri_string())[0] == "admin") {
            $items = [
              ["label" => "Siswa", 'icon' => 'book-open', "to" => "admin/siswa"],
              ["label" => "Guru", 'icon' => 'clipboard', "to" => "admin/guru"]
            ];
          } else {
            $items = [
              ["label" => "Dashboard", 'icon' => 'home', "to" => "/guru"],
              ["label" => "KBM", 'icon' => 'home', "to" => "/guru/kbm"],
            ];
            if ($this->session->userdata('kelas_id')) {
              array_push($items, ["label" => "Sikap", 'icon' => 'user', "to" => "/guru/sikap"]);
            }
            array_push($items, ["label" => "Presensi", 'icon' => 'users', "to" => "/guru/presensi"]);
          }
        ?>
        <?php $i = 0; foreach ($items as $item): ?>
          <li class="sidebar-item<?= $i == 0 ? ' mt-3' : '' ?>">
            <a href="<?= base_url($item['to'])?>"
              class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i
                data-feather="<?= $item['icon'] ?>" class="feather-icon"></i><span class="hide-menu"><?= $item['label'] ?></span></a>
          </li>
        <?php $i++; endforeach; ?>
        <li class="sidebar-item" style="position: absolute; bottom: 0">
          <a class="sidebar-link waves-effect waves-dark sidebar-link"
            href="<?php echo base_url('auth/logout')?>" aria-expanded="false"><i data-feather="log-out"
              class="feather-icon"></i><span class="hide-menu">Log Out</span></a>
        </li>
      </ul>
    </nav>
  </div>
</aside>