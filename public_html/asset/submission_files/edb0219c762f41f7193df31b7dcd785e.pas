var
c,d,nol,i:longint;
at,bt,x,a,b:array[0..10009] of longint;
begin
nol:=0;
readln(d);
for c:= 1 to d do begin
    readln(x[c]);
    for i:= 1 to x[c] do readln(a[i],b[i]);
    at[c]:=0;
    bt[c]:=0;
    for i := 1 to x[c] do begin
        at[c]:=at[c]+a[i];
        bt[c]:=bt[c]+b[i];
    end;
end;

for i:= 1 to d do
    if at[i]=bt[i] then writeln(x[i]) else writeln(nol);
end.