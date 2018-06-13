var n,i:longint;
x:array[1..100000] of longint;
begin
readln(n);
for i:= 1 to n do readln(x[i]);
for i:= 1 to n do writeln(trunc(sqrt(x[i])));
end.