function estado() {
  if ($maqui->tumapr == 0 && $maqui->arcomp <> 0) {

  }

}

@if (($maqui->tumapr == 0 && $maqui->arcomp <> 0))
  <div class="  mb-1 bg-success text-white">
@elseif (($maqui->tumapr == 0 && $maqui->arcomp == 0))
  <div class="  mb-1 bg-white text-white">
@else
  <div class="  mb-1 bg-primary text-white">
@endif
