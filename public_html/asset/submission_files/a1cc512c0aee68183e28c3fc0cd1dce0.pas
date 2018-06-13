program lamp;
type
keadaan=(padam,menyala);
kondisi=(ditekan);
var
//misal lampu 1 = n[0] dst serta saklar 1 = saklar[0] dst
n:array[0..2] of keadaan;
saklar:array[0..2] of kondisi;
jml:array[0..2] of integer;//jumlah lampu yg menyala terakhir
begin
if saklar[0]=ditekan then
    begin
    n[0]:=menyala;
    n[1]:=menyala;
    n[2]:=menyala;
    jml[0]:=3;
    end
else if saklar[1]=ditekan then
    begin
    n[0]:=menyala;
    n[1]:=padam;
    n[2]:=menyala;
    jml[1]:=2;
    end
else if saklar[2]=ditekan then
    begin

    n[0]:=menyala;
    n[1]:=padam;
    n[2]:=padam;
     jml[2]:=1;
     writeln(jml[2]);
    end;
end.







