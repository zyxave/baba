#include <iostream>
#include <iomanip>

using namespace std;
int T,P[10][11];

long double factorial(int l){
	long double b = 1;
	for (int d=1;d<(l+1);d++){
		b *= d;
	}
	return b;
}

long double pangkat (int q,int pangkat){
	long double v = 1;
	for (int i = 0; i < pangkat;i++){
		v *= q;
	}
	return v;
}

long double combinasi(int k,int g){
	long double r = factorial(k) / (factorial(k-g)*factorial(g));
	return r;
}

int main(){
	cin >> T;
	for (int k = 0;k<T;k++){
		cin  >> P[k][k] >> P[k][k+1];
	}
	
	for (int p = 0; p<T; p++){
		int po = (P[p][p+1]);
		for (int h = 0;h<(P[p][p+1]+1);h++){
			if (h < (P[p][p+1])){
				if (po >1){
					if (h == 0){

			cout << "x" << po << " ";
			po--;
		}
		else {
			
cout << setprecision(23)<<pangkat(P[p][p],h)*combinasi(P[p][p+1],h) << "x" << po << " ";
po--;		}
		} else {
			cout <<setprecision(23)<< pangkat(P[p][p],h)*combinasi(P[p][p+1],h) << "x" << " ";         
		}
		}else {
			cout <<setprecision(23) <<	pangkat(P[p][p],h) << endl;
		}
	}
	}
	
	return 0;
	
}
