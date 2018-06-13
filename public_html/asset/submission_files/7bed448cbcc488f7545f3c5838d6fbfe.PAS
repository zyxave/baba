program SUPER_STRING;
uses crt;
var
i,r,tes,l,k:integer;
T: array[0..8] of string;
begin
i:=1;
l:=0;
k:=0;
tes:=1;
Writeln('Jumlah Case?');
Readln(tes);
for  i:=1 to tes do
begin
Readln(r);
T[l]:=r;
l:=l+1;
end;
for i:=1 to tes do
begin
Writeln(T[k]);
k:=k+1;
readln;
end.
