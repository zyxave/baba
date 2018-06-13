program arraygame;

var a,b,c :longint;
x: array [1..10000] of integer;
N : array [1..10000] of integer;
M : array [1..10000] of integer;
jawab : array [1..10000] of integer;

begin
readln(a);
for b := 1 to a do begin
read (N[b]); read (M[b]);
end;

for c := 1 to a do begin
jawab[c]:= 0;
end;
end.