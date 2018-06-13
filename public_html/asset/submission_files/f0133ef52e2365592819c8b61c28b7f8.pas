var
h,d,b,u,j :array[1..1000009] of longint;
a,i:longint;
begin
readln(a);
for i:= 1 to a do readln(h[i],d[i],b[i],u[i]);
for i:= 1 to a do begin
j[i] := 0;
while (u[i] >= h[i]) do begin
inc(j[i]);
if h[i]<b[i] then h[i]:=b[i];
u[i] := u[i] - h[i];
h[i]:=h[i]-d[i];
if h[i]<b[i] then h[i]:=b[i];
end;
end;
for i:= 1 to a do (writeln(j[i]));
end.