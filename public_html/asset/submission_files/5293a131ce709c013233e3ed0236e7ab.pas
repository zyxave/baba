var
p,a,m,r,t,z,x,y,pr,g:longint;
begin
readln(t);
for z:=1 to t do
begin
readln(p,a,m,r);
pr:=p;
g:=0;
if r>=p then
repeat
r:=r-pr;
if ((pr-a)>=m) then pr:=pr-a else pr:=m;
inc(g);
until r<pr;
writeln(g);
end;
end.