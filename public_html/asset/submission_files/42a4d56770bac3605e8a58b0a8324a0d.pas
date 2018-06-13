var
input : array [1..10, 1..1000] of string;
output : array [1..10, 1..1000] of string;
hasil : string;
tc : array [1..10] of integer;
t,k,n,c : integer;
error : boolean;

function ceknama(a : string) : boolean;
var
spasi : integer;
hitung : integer;
v : integer;
begin
ceknama := true;
spasi := 0;
hitung := 0;
for v := 1 to length(a) do begin
if (a[v] = ' ') then
begin
if (hitung < 3) or (hitung > 20) then ceknama:=false;
hitung := 0;
spasi := spasi + 1;
end
else hitung:=hitung+1;
end;

if (hitung < 3) or (hitung > 20) then ceknama:=false;

if spasi > 2 then ceknama := false;

end;

function cekada(x : string;tc, index : integer) : boolean;
var
i : integer;

begin
        cekada := false;
        i := 1;
        while (not cekada) and (i < index) do
        begin
                if (output[tc][i] = x) then cekada  := true
                else i := i + 1;
        end;
end;

function bentuknama1(x : string) : string;
begin
bentuknama1 := upcase(Copy(x,1,3));
end;

function bentuknama2(x : string) : string;
begin
bentuknama2 := upcase(Copy (x,1,2) + Copy (x,pos(' ',x) + 1,1));
end;

procedure gagal(tc: integer) ;
begin
output[tc][1] := 'GAGAL';
end;


begin
readln(t);
for k := 1 to t do begin
        readln(n);
        tc[k] := n;
        for c := 1 to n do begin
        readln(input[k][c]);
        if ceknama(input[k][c]) then
        begin
                hasil := bentuknama1(input[k][c]);
                if cekada(hasil,k,c) then
                begin
                        hasil := bentuknama2(input[k][c]);
                        if cekada(hasil,k,c) then gagal(k);
                end;
                output[k][c] := hasil;
        end
        else gagal(k);
        end;
end;

for k:=1 to t do
begin
        c:=1;
        error := false;
        while (c<=tc[k]) and (not error) do
        begin
                if (output[k][c] = 'GAGAL') then
                begin
                write('GAGAL');
                error := true;
                end else
                begin
                write(output[k][c],' ');
                c := c +1;
                end;
        end;
        writeln;
end;
end.

















