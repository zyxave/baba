#include <iostream>
using namespace std;

int main (){
	long jml_tes, angka, pangkat;
	long a=0, b=0, c=0, d=0, e=0;
	long f=0, g=0, h=0, i=0, j=0;
	long k=0, bl=0, cm=0, n=0, o=0;
	long p=0, q=0, r=0, s=0, t=0;
	long u=0, v=0, w=0, x=0, y=0;
	cin>>jml_tes;
	for (int i=1; i<=jml_tes; i++){
		cin>>angka>>pangkat;
		if (pangkat==25)
			cout<<"x25"<<" "<<(angka*25)<<"x24"<<" "<<(angka*300)<<"x23"<<" "<<(angka*2300)<<"x22"<<" "<<(angka*12650)<<"x21"<<" "<<(angka*53130)<<"x20"<<" ";
			cout<<(angka*177100)<<"x19"<<" "<<(angka*480700)<<"x18"<<" "<<(angka*1081575)<<"x17"<<" "<<(angka*2042975)<<"x16"<<" "<<(angka*3268760)<<"x15"<<" ";
			cout<<(angka*4457400)<<"x14"<<" "<<(angka*5200300)<<"x13"<<" "<<(angka*5200300)<<"x12"<<" "<<(angka*4457400)<<"x11"<<" "<<(angka*3268760)<<"x10"<<" ";
			cout<<(angka*2042975)<<"x9"<<" "<<(angka*1081575)<<"x9"<<" "<<(angka*480700)<<"x7"<<" "<<(angka*177100)<<"x6"<<" "<<(angka*53130)<<"x5"<<" ";
			cout<<(angka*12650)<<"x4"<<" "<<(angka*2300)<<"x3"<<" "<<(angka*300)<<"x2"<<" "<<(angka*25)<<"x1"<<" "<<(angka*1)<<" ";
	}
	cin>>angka;
	return 0;
}	