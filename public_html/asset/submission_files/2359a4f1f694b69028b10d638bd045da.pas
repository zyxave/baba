var
 p,a,m,r,jumlah,x : array[1..100009] of longint;
 T,i : integer;
begin
 readln(T);
 for i := 1 to T do
 readln(p[i],a[i],m[i],r[i]);
 for i := 1 to T do begin
  if p[i] <= m[i] then p[i] := m[i];
  while r[i] >= p[i] do begin
  jumlah[i] := jumlah[i] + 1;
  r[i] := r[i] - p[i];
  x[i] := p[i] - a[i];
  if x[i] > m[i] then p[i] := x[i] else p[i] := m[i];
  end;
 end;
 for i := 1 to T do
 writeln(jumlah[i]);
end.