#include <iostream>
using namespace std;
main()
{	int harga,bayar,kembalian,A,B,C,D,sisa;
	cout<<"Masukkan jumlah uang yang dibayarkan = ";
	cin>>bayar;
	cout<<"Masukkan jumlah harga barang Anda = ";
	cin>>harga;
	kembalian=(bayar-harga);
	cout<<"Kembalian = "<<kembalian<<endl;
	if(kembalian>=100)
		{A=kembalian/100;
		kembalian=kembalian%100;
		}
	if(kembalian>=20)
		{B=kembalian/20;
		kembalian=kembalian%20;
		}
	if(kembalian>=5)
		{C=kembalian/5;
		kembalian=kembalian%5;
		}
	if(kembalian>=1)
		{D=kembalian/1;
		kembalian=kembalian%1;
		}
	cout<<"100 sen = "<<A<<", ";
	cout<<"20 sen = "<<B<<", ";
	cout<<"5 sen = "<<C<<", ";
	cout<<"1 sen = "<<D;
	
}
	
	
	
