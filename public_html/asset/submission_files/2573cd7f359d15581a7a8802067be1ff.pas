var
	T,n : integer;
function f(n : integer) : integer;
begin
	readln(T);
	f(n) := f(n) mod 10^9 +7;
	writeln(n);
end;