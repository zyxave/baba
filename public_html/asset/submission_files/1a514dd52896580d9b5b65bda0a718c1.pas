uses crt;
var
i, t, j, k, l : integer;
isi : array[1..500] of integer;
uang : integer;
buku : integer;
harga : integer;
begin
clrscr;
readln(t);
for i := 1 to t do begin
  read(buku, uang);
  for j:= 1 to buku do begin
  read(isi[j]);
  harga:=isi[j] + isi[j-1];
  if harga>uang then writeln('Billy Rapopo')
  else begin
  k:= isi[j];
  l:=isi[j-1];
  end;
end;
end;
writeln(k,l);
end.



