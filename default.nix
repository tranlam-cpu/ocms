{ pkgs, ... }:
let
  october = pkgs.october.packages.latest;
in
pkgs.stdenv.mkDerivation {
  name = "october";
  buildInputs = [
    pkgs.php
    pkgs.composer
    october
  ];
  shellHook = ''
    export PATH=$PATH:${october}/bin
  '';
}
