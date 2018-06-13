var
s,a,j,i:longint;
x,hasil:array[1..1000000] of longint;
begin
    readln(a);
    for i:= 1 to a do readln(x[i]);
    for i:= 1 to a do begin
    for j:= 1 to x[i] do begin
        if sqr(j)<=x[i] then hasil[i]:=j
        else break;
    end;                      end;
    for i:= 1 to a do writeln(hasil[i]);
end.
