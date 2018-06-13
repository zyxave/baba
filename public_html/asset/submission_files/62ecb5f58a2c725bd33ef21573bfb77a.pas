program baru;
var
t,i,p,a,m,r,j : integer;
begin
readln(t);
for i := 1 to t do
begin
j:=0;
readln(p,a,m,r);
while p > m do
while r > p do
begin
j:=j+1;
r:=r-p;
p:=p-a;
if p < m then
p:=m
else end;
writeln(j);
end;
end.
