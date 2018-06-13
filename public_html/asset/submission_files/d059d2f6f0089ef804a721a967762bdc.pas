var n,j,i:longint;
x:array[1..100000] of longint;
begin
readln(n);
for i:= 1 to n do readln(x[i]);
for j:= 1 to n do writeln(trunc(sqrt(x[j])));
end.