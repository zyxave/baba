program pangkat;
uses math;
var T, P, Q, i: integer;

function max(x, y: integer): integer;
begin
  if x > y then max := x
  else max := y;
end;

function pangkat(b, e: integer): int64;
var i: integer;
    r: int64;
begin
  r := 1;
  if e = 0 then pangkat := 1
  else for i := 1 to e do r := r * b;
  pangkat := r;
end;

function kombinasi(n, x: integer): int64;
var i: integer;
    r: int64;
begin
  r := 1;
  for i := n downto max(x, n - x) + 1 do r := r * i;
  for i := 1 to n - max(x, n - x) do r := r div i;
  kombinasi := r;
end;

begin
  readln(T);
  while T > 0 do begin
    T := T - 1;
    readln(P, Q);
    for i := 0 to Q do begin
      if i > 0 then write(kombinasi(Q, i) * pangkat(P, i));
      if i <> Q then write('x');
      if Q - i > 1 then write(Q - i);
      if i < Q then write(' ');
    end;
    writeln;
  end;
end.
