#include<iostream>
#include<bits/stdc++.h>

using namespace std;

int main()
{
	int T,j;
	cin >> T;
	for (j=1; j<=T; j++)
{

	
	// n= jumlah pekerja & banyak array per proyek
	// d= jam maximum bekerja
	// r= bayaran r dollar per jam
	
	int n,d,r,i;
	
	cin >> n >> d >> r;

	
				//inisiasi array x & y	
	int x [n];
	int y [n]; 	
	
	
				// memasukkan jam pekerja x & y

	for (i=1; i<=n; i++)
	{
		cin >> x[i];
	}
	

	for (i=1; i<=n; i++)
	{
		cin >> y[i];
	}
	
	
				//menghitung jam lembur
	int totaljam,jamlembur,selisih;
	jamlembur=0;
	
	for(i=1; i<=n; i++)
	{
		totaljam=x[i]+y[i];
		
		if (totaljam>d)
		{
			selisih= totaljam-d;
			jamlembur= jamlembur+selisih;
		}
	}
	
	int bayar= r*jamlembur;
	
	cout << bayar;
}
}
