program ilpc;
var
t,p,a,m,r,j,l,i,s : integer;

begin
readln(t);
j:=0;
for i :=1 to t do
begin
readln(p,a,m,r);
begin
while r >= p do
begin
r:=r-p;
p:=p-a;
j:=j+1;
begin
if m > p then
r:=p-1
else  end;
end;
writeln(j);
end;
end;
end.
