program vending;
var
t,a,b,i,k,l,m,n,jumlah,hasil : integer;

begin
readln(t);
for i:=1 to t do
begin
readln(a,b);
jumlah:=a-b;

begin
k:=jumlah div 100;
jumlah:=jumlah-(k*100);
l:=jumlah div 20;
jumlah:=jumlah-(l*20);
m:=jumlah div 5;
jumlah:=jumlah-(m*5);
n:=jumlah div 1;
jumlah:=jumlah-(n*1);
hasil:=k+l+m+n;
end;
writeln(hasil);
end;
end.



