<?php 
    
    PageHeader(
        "Pegawai",
        "Pengelolaan data induk dan informasi profil pegawai",
       buttonhref("?pg=$pg&fl=tambah","Tambah","primary","circle-plus",$attbr="")
    );
    
    
    PageContentTabel(
    <<<th
        <th class="ps-4 py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Pegawai</th>
        <th class="py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Role</th>
        <th class="pe-4 py-3 text-end text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Aksi</th>
    th,
    <<<Td
        <td class="ps-4 py-3">
            <div class="d-flex align-items-center">
                <div class="position-relative me-3">
                    <img src="https://ui-avatars.com/api/?name=Nano Supriatna&background=4f46e5&color=fff" class="rounded-circle shadow-sm" style="width: 42px; height: 42px; font-size: 0.9rem;">
                    <span class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                </div>
                <div>
                    <span class="text-muted small">nans</span>
                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Nano</h6>
                </div>
            </div>
        </td>
        <td class="py-3 small">Admin</td>
        <td class="pe-4 py-3 text-end">
            <div class="dropdown">
                <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>
                    <i data-lucide="more-horizontal" style="width:16px"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="z-index: 9999;">
                    <li><a href="?pg=$pg&fl=edit&id=xxx" class="dropdown-item small"><i data-lucide="pencil" style="width: 16px;"></i> Edit</a></li>
                    <li><a href="?pg=$pg&fl=reset&id=xxx" class="dropdown-item small"><i data-lucide="key" style="width: 16px;"></i> Reset</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a href="#" class="dropdown-item small text-danger bg-danger bg-opacity-10"
                        data-bs-toggle="modal" 
                        data-bs-target="#modalHapus" 
                        onclick="konfirmasiHapus('?pg=$pg&fl=list&aksi=hapus&id=XXXXX')">
                        <i data-lucide="trash-2" style="width: 16px;"></i> Hapus</a>
                    </li>
                </ul>
            </div>
        </td>
    Td,
    <<<knum
        <span class="text-muted small">Showing <strong>1-10</strong> of <strong>25</strong> users</span>
    knum,
    <<<num
        <li class="page-item disabled"><a class="page-link border-0" href="#">Prev</a></li>
        <li class="page-item active"><a class="page-link border-0 bg-primary shadow-sm" href="#">1</a></li>
        <li class="page-item"><a class="page-link border-0 text-secondary" href="#">2</a></li>
        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
    num
    );
?>