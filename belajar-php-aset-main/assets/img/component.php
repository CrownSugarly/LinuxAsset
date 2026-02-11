<?php
    function button($var="",$val="",$warna="",$icon="",$attbr="")
    {
        return <<<button
            <button type="submit" name="$var" value="$val" class="btn btn-$warna fw-bold py-2 shadow-sm" style="border:none;" $attbr>
                <i data-lucide="$icon" style="width:18px" class="me-1"></i> $val
            </button>
        button;
    }

    function buttonhref($link="",$val="",$warna="",$icon="",$attbr="")
    {
        return <<<buttonhref
            <a href="$link" class="btn btn-$warna fw-bold py-2 shadow-sm" style="border:none;" $attbr>
                <i data-lucide="$icon" style="width:18px" class="me-1"></i> $val
            </a>
        buttonhref;
    }

    function PageHeader($Judul="",$JudulDeskripsi="",$Tambahan){
        echo <<<PageHeader
            <div class="row align-items-center mb-4 g-3">
                <div class="col-md-6">
                    <h4 class="fw-bold text-dark mb-0" style="letter-spacing: -0.5px;">$Judul</h4>
                    <p class="text-secondary small mb-0 mt-1">$JudulDeskripsi</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex gap-2 justify-content-md-end">
                        $Tambahan
                    </div>
                </div>
            </div>
        PageHeader;
    }

    function PageContentTabel($th="",$tr="",$ketnum="",$li="")
    {
        echo <<<PageContent
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: #fff;">
                <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                        <table class="table table-hover align-middle mb-0" style="border-collapse: collapse; white-space: nowrap;">
                
                            <thead class="bg-white border-bottom sticky-top" style="z-index: 10;">
                                <tr>
                                    $th
                                </tr>
                            </thead>

                            <tbody class="border-top-0">
                                <tr class="group-hover-shadow">
                                    $tr
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top py-3 px-4">
                     <div class="d-flex justify-content-between align-items-center">
                        $ketnum
                        <nav>
                            <ul class="pagination pagination-sm mb-0 gap-1">
                                $li
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        PageContent;
    }

    function PageContentForm($Konten)
    {
        echo <<<PageContent
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: #fff;">
                <div class="card-body p-4">
                    $Konten
                </div>
                <div class="card-footer bg-white border-top py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        &nbsp
                    </div>
                </div>
            </div>
        PageContent;
    }

?>