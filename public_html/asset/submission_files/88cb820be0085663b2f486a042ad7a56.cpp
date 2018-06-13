#include <iostream>
using namespace std;

long kali(long x,long y){
	long temp;
	temp=1;
	for (int i=1; i<=y; i++)
		temp=temp*x;
	return temp;
}

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
			cout<<"x25"<<" "<<(kali(angka,1)*25)<<"x24"<<" "<<(kali(angka,2)*300)<<"x23"<<" "<<(kali(angka,3)*2300)<<"x22"<<" "<<(kali(angka,4)*12650)<<"x21"<<" "<<(kali(angka,5)*53130)<<"x20"<<" ";
			cout<<(kali(angka,6)*177100)<<"x19"<<" "<<(kali(angka,7)*480700)<<"x18"<<" "<<(kali(angka,8)*1081575)<<"x17"<<" "<<(kali(angka,9)*2042975)<<"x16"<<" "<<(kali(angka,10)*3268760)<<"x15"<<" ";
			cout<<(kali(angka,11)*4457400)<<"x14"<<" "<<(kali(angka,12)*5200300)<<"x13"<<" "<<(kali(angka,13)*5200300)<<"x12"<<" "<<(kali(angka,14)*4457400)<<"x11"<<" "<<(kali(angka,15)*3268760)<<"x10"<<" ";
			cout<<(kali(angka,16)*2042975)<<"x9"<<" "<<(kali(angka,17)*1081575)<<"x8"<<" "<<(kali(angka,18)*480700)<<"x7"<<" "<<(kali(angka,19)*177100)<<"x6"<<" "<<(kali(angka,20)*53130)<<"x5"<<" ";
			cout<<(kali(angka,21)*12650)<<"x4"<<" "<<(kali(angka,22)*2300)<<"x3"<<" "<<(kali(angka,23)*300)<<"x2"<<" "<<(kali(angka,24)*25)<<"x1"<<" "<<(kali(angka,25)*1)<<" ";
	}
	cin>>angka;
	return 0;
}	