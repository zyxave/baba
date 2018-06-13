program baru;
var
t,i,p,a,m,r,j : integer;

begin
readln(t);
j:=0;
for i := 1 to t do
begin
readln(p,a,m,r);
while p > m do
begin
while r >= p do
begin

j:=j+1;
r:=r-p;
p:=p-a;

if p < m then
p:=m
else end;
end;
writeln(j);
end;
end.
