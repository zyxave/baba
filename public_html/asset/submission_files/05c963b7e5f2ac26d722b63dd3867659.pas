uses crt;
var transaksi,x,masuk,harga,kembalian,d1,dx1,s20,sx20,s5,sx5,s1,akhir:integer;
begin
readln(transaksi);
for x:= 1 to transaksi do
begin
readln(masuk,harga);
kembalian:= (masuk - harga);
d1:=(kembalian div 100);
dx1:=(kembalian mod 100);
s20:=(dx1 div 20);
sx20:=(dx1 mod 20);
s5:=(sx20 div 5);
sx5:=(sx20 mod 5);
s1:=(sx5 div 1);
akhir:=(d1+s20+s5+s1);
writeln(akhir);
end;
readln;
end.