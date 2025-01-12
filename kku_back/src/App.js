import { Routes, Route, Navigate } from 'react-router-dom';
import PrivateRoutes from "./utils/PrivateRoutes";
import { Suspense } from 'react';
import { useSelector } from 'react-redux'; 
import './App.scss'; 

/* Component pages */
import ConfigPage from "./pages/config/config";
import LoginPage from "./pages/login/login";
import RegisterPage from "./pages/register/register";
import GuestRoutes from './utils/guestRoutes';
import LangConfigPage from './pages/langconfig';
import AdminPage from './pages/admin/admin';
import BounceLoading from './components/ui/loading/bounce/bounce';
import SpawnLoading from './components/ui/loading/spawn/spawn';
import WebInfoPage from './pages/webinfo/webinfo';
import ForgetPasswordPage from './pages/forgetpassword/forgetpassword';
import CategoryPage from './pages/category/category';
import SubCategoryPage from './pages/subcategory/subcategory';
import PostPage from './pages/post/post';
import InboxPage from './pages/inbox/inbox';
import ResetPasswordPage from './pages/resetpassword/resetpassword';
import ProductPage from './pages/product/product.js';
import ServicePage from './pages/service/service.js'
import MessagePage from './pages/message/message.js';
import PortfolioPage from './pages/portfolio/portfolio.js';
import DesignPage from './pages/design/design.js';
import SlidePage from './pages/slide/slide.js';
import LecturePage from './pages/lecturer/lecturer.js';
import ActivityPhoto from './pages/activityphoto/activityphoto.js';
import PostContentPage from './pages/postcontent/postcontent.js';
import SeminarSchedule from './pages/seminarSchedule/seminarschedule.js';
import RoomSeminar from './pages/roomseminar/roomseminar.js';
import HotelPost from './pages/hotelpost/postcontent.js';

function App() {
  const pagesAllow = useSelector((state) => state.app.pages)
  const isDevMode = useSelector((state) => state.app.isDevMode)

  return (

    <Suspense>
        {/* Animetion loading */}
        <BounceLoading />
        <SpawnLoading />
        <Routes>
          <Route element={<PrivateRoutes />} >
            <Route path="/" element={<Navigate to="/categories" />} />
            {pagesAllow.categories && <Route path="categories" element={<CategoryPage />} /> }
            {pagesAllow.subcategories && <Route path="subcategories" element={<SubCategoryPage />} /> }
            {pagesAllow.products && <Route path="products" element={<ProductPage />} /> }
            {pagesAllow.services && <Route path="services" element={<ServicePage />} /> }
            {pagesAllow.portfolios && <Route path="portfolios" element={<PortfolioPage />} /> }
            {pagesAllow.designs && <Route path="designs" element={<DesignPage />} /> }
            {pagesAllow.posts && <Route path="posts" element={<PostPage />} /> }
            {pagesAllow.postscontent && <Route path="postscontent" element={<PostContentPage />} /> }
            {pagesAllow.hotelpost && <Route path="hotelpost" element={<HotelPost />} /> }
            {pagesAllow.seminarSchedule && <Route path="seminarschedule" element={<SeminarSchedule />} /> }
            {pagesAllow.roomSeminar && <Route path="roomseminar" element={<RoomSeminar />} /> }
            {pagesAllow.lecturers && <Route path="lecturers" element={<LecturePage />} /> }
            {pagesAllow.activityphoto && <Route path="activityphoto" element={<ActivityPhoto />} /> }
            {pagesAllow.messages && <Route path="messages" element={<MessagePage />} /> }
            {pagesAllow.webinfo && <Route path="webinfo" element={<WebInfoPage />} /> }
            {pagesAllow.languages && <Route path="languages" element={<LangConfigPage />} /> }
            {pagesAllow.admins && <Route path="admins" element={<AdminPage />} /> }
            {pagesAllow.configs && <Route path="configs" element={<ConfigPage />} />  }
            {pagesAllow.slides && <Route path="slides" element={<SlidePage />} />  }
            <Route path="*" element={<Navigate to="/messages" />} />
            {/* <Route path="*" element={<MessagePage />} /> */}
          </Route>
          <Route element={<GuestRoutes />} >
            <Route path="login"  element={<LoginPage />} />
            <Route path="register"  element={<RegisterPage />} />
            <Route path="forgetpassword"  element={<ForgetPasswordPage />} />
            <Route path="resetpassword/:token"  element={<ResetPasswordPage />} />
          </Route>
        </Routes>
    </Suspense>
  )
}
export default App;


